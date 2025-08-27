<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::with('productVariants.stockBalance');

        if ($request->has('search') && !empty($request->search)) {
            $search = strtolower($request->search);

            $query->where(function ($q) use ($search) {
                $q->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
                    ->orWhereRaw('LOWER(sku) LIKE ?', ["%{$search}%"]);
            });
        }

        $products = $query->paginate(5);
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
        $data = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'  => 'required|string',
            'sku'   => 'required|string',
            'category' => 'required|string',
            'variants' => 'required|array|min:1', // minimal 1 variant
            'variants.*.sku'   => 'required|string',
            'variants.*.price' => 'required|numeric|min:0',
            'variants.*.size' => 'required|string',
        ]);

        // Simpan file ke local storage (storage/app/products)
        $imagePath = $request->file('image')->store('products');

        // Simpan produk
        $product = Product::create([
            'name'  => $data['name'],
            'sku'   => $data['sku'],
            'category' => $data['category'],
            'image' => $imagePath, // simpan pathnya di database
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
