<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::with('productVariants')->orderBy('is_archived', 'asc')->orderBy('id', 'asc');

        // kalau tidak checklist, filter hanya yang aktif
        if (!$request->has('include_archived')) {
            $query->where('is_archived', false);
        }

        if ($request->filled('search')) {
            $search = strtolower($request->search);
            $query->where(function ($q) use ($search) {
                $q->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
                    ->orWhereRaw('LOWER(sku) LIKE ?', ["%{$search}%"]);
            });
        }

        $products = $query->paginate(5)->appends($request->query()); // biar pagination tetap bawa parameter

        return view('products.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'name'  => 'required|string',
                'slug'  => 'required|string|unique:products,slug',
                'sku'   => 'required|string|unique:products,sku',
                'category' => 'required|exists:categories,id',
                'variants' => 'required|array|min:1', // minimal 1 variant
                'variants.*.sku'   => 'required|string|unique:product_variants,sku',
                'variants.*.price' => 'required|numeric|min:0',
                'variants.*.size'  => 'required|string',
            ],
            [
                // 🔹 Pesan global
                'image.required' => 'Gambar produk wajib diupload.',
                'image.image'    => 'File harus berupa gambar.',
                'image.mimes'    => 'Format gambar hanya boleh jpeg, png, jpg, gif, atau svg.',
                'image.max'      => 'Ukuran gambar maksimal 2MB.',

                'name.required'  => 'Nama produk wajib diisi.',
                'slug.required'  => 'Slug produk wajib diisi.',
                'slug.unique'    => 'Slug produk sudah digunakan, silahkan gunakan yang lain.',
                'category.exists'  => 'Kategori produk tidak ditemukan.',
                'sku.required'   => 'SKU produk wajib diisi.',
                'sku.unique'   => 'SKU sudah digunakan, silahkan gunakan yang lain.',
                'category.required' => 'Kategori produk wajib diisi.',

                'variants.required' => 'Minimal harus ada 1 varian.',
                'variants.array'    => 'Data varian harus berupa array.',

                // 🔹 Pesan spesifik varian
                'variants.*.sku.required'  => 'SKU varian wajib diisi.',
                'variants.*.sku.unique'    => 'SKU varian ke-:position sudah digunakan, silakan gunakan yang lain.',
                'variants.*.price.required' => 'Harga varian wajib diisi.',
                'variants.*.price.numeric' => 'Harga varian harus berupa angka.',
                'variants.*.size.required' => 'Ukuran varian wajib diisi.',
            ]
        );

        // Simpan file ke local storage (storage/app/products)
        $imagePath = $request->file('image')->store('products', 'public');

        // Simpan produk
        $product = Product::create([
            'name'  => $data['name'],
            'slug'  => $data['slug'],
            'sku'   => $data['sku'],
            'category_id' => $data['category'],
            'photo' => $imagePath, // simpan pathnya di database
        ]);

        // Simpan variants
        foreach ($data['variants'] as $variant) {
            $product->productVariants()->create($variant);
        }

        return redirect()
            ->route('products.index')
            ->with('success', 'Product berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // ambil relasi supaya tidak N+1
        $product->load(['productVariants', 'category']);

        $qrCode = QrCode::size(50)->generate($product->sku);

        return view('products.show', compact('product', 'qrCode'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        // dd($product,   $request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            // ✅ SKU harus unik di tabel products kecuali untuk product ini
            'sku' => [
                'required',
                'string',
                'max:100',
                Rule::unique('products', 'sku')->ignore($product->id),
            ],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'slug')->ignore($product->id),
            ],
            'category' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'variants' => 'required|array|min:1',
            'variants.*.sku' => 'required|string|max:100',
            'variants.*.price' => 'required|numeric|min:0',
            'variants.*.size' => 'required|string|max:10',
        ]);
        DB::beginTransaction();
        try {

            // ✅ Update foto jika ada file baru
            if ($request->hasFile('image')) {
                if ($product->photo && Storage::disk('public')->exists($product->photo)) {
                    Storage::disk('public')->delete($product->photo);
                }
                $path = $request->file('image')->store('products', 'public');
                $product->photo = $path;
            }

            // ✅ Update data utama produk
            $product->update([
                'name' => $request->name,
                'sku' => $request->sku,
                'category_id' => $request->category,
                'photo' => $product->photo,
            ]);

            // ✅ Handle variants
            $keepIds = [];

            foreach ($request->variants as $variantData) {
                if (!empty($variantData['id'])) {
                    // --- update variant lama
                    $variant = ProductVariant::where('id', $variantData['id'])
                        ->where('product_id', $product->id)
                        ->first();

                    if ($variant) {
                        $variant->update([
                            'sku' => $variantData['sku'],
                            'price' => $variantData['price'],
                            'size' => $variantData['size'],
                            'is_archived' => isset($variantData['is_archived']) ? 1 : 0,
                        ]);
                        $keepIds[] = $variant->id;
                    }
                } else {
                    // --- create variant baru
                    $newVariant = $product->productVariants()->create([
                        'sku' => $variantData['sku'],
                        'price' => $variantData['price'],
                        'size' => $variantData['size'],
                        'is_archived' => isset($variantData['is_archived']) ? 1 : 0,
                    ]);
                    $keepIds[] = $newVariant->id;
                }
            }

            // --- delete variant yang tidak ada di form
            $product->productVariants()
                ->whereNotIn('id', $keepIds)
                ->delete();

            DB::commit();

            return redirect()
                ->route('products.index')
                ->with('success', 'Produk berhasil diupdate!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Update gagal: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        $product->productVariants()->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function archive(Product $product)
    {
        $product->update(['is_archived' => true]);
        $product->update(['archived_at' => now()]);
        return redirect()->route('products.index')->with('success', 'Produk berhasil diarsipkan.');
    }

    public function restore(Product $product)
    {
        $product->update(['is_archived' => false]);
        $product->update(['archived_at' => null]);
        return redirect()->route('products.index')->with('success', 'Produk berhasil dipulihkan.');
    }
}
