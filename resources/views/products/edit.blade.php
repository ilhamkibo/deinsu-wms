@extends('layouts.app')

@section('content')

    <div>
        <div class="p-4 block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5  dark:border-gray-700"
            bis_skin_checked="1">
            <div class="w-full mb-1" bis_skin_checked="1">
                <div class="mb-4" bis_skin_checked="1">
                    <nav class="flex mb-5" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                            <li class="inline-flex items-center">
                                <a href={{ route('dashboard') }}
                                    class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                                    <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                        </path>
                                    </svg>
                                    Home
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center" bis_skin_checked="1">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <a href={{ route('products.index') }}
                                        class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Products</a>
                                </div>
                            </li>

                            <li>
                                <div class="flex items-center" bis_skin_checked="1">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <a href={{ route('products.show', $product->slug) }}
                                        class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">{{ $product->name }}</a>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center" bis_skin_checked="1">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500"
                                        aria-current="page">Edit</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Edit product</h1>
                </div>

            </div>
        </div>

        @if ($errors->any())
            <div id="errorBox"
                class="fixed top-5 mt-16 right-5 w-96 max-w-full bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-lg opacity-0 transform translate-y-[-20px] transition-all duration-500 ease-in-out">
                <div class="flex items-start">
                    <!-- Icon -->
                    <svg class="w-6 h-6 text-red-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856C18.07 19 19 18.07 19 16.938V7.062C19 5.93 18.07 5 16.938 5H7.062C5.93 5 5 5.93 5 7.062v9.876C5 18.07 5.93 19 7.062 19z" />
                    </svg>
                    <!-- Messages -->
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="mb-1">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form action={{ route('products.update', $product->id) }} method="POST" enctype="multipart/form-data"
            class="border-b border-gray-200 dark:border-gray-700 flex flex-col md:flex-row p-4 gap-4 justify-center items-center md:items-start">
            @csrf
            @method('PUT')
            {{-- Product image --}}
            <div
                class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md sm:max-w-lg w-full space-y-4">
                <div class="border-b border-gray-200 dark:border-gray-700 p-2">
                    <h1 class="text-base font-semibold text-gray-900 sm:text-xl dark:text-white">Upload Image</h1>
                </div>
                <div class="flex justify-center h-96 p-1">
                    <!-- Preview image -->
                    <img id="preview-image" src="{{ asset('storage/' . $product->photo) }}" alt="Preview"
                        class="max-h-96 rounded-lg  object-contain" />
                </div>
                <div class="p-2">
                    <input type="file" accept="image/*" name="image"
                        class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer 
                           bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 
                           dark:border-gray-600 dark:placeholder-gray-400"
                        value="{{ old('image') }}" id="file_input" required>
                </div>
            </div>
            {{-- Product form --}}
            <div
                class="border border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-md bg-gray-50 sm:max-w-lg w-full">
                {{-- header --}}
                <div class=" border-b border-gray-200 dark:border-gray-700 p-2">
                    <h1 class="text-gray-900 dark:text-white font-semibold sm:text-xl text-base ">Product Form</h1>
                </div>
                {{-- product --}}
                <div class="p-2 grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Product
                            Name</label>
                        <input type="text" id="name" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Kemeja Adem" required value="{{ $product->name }}" />
                    </div>
                    <div class="">
                        <label for="sku"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SKU</label>
                        <input type="text" id="sku" name="sku"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="XXX" required value="{{ $product->sku }}" />
                    </div>
                    <div>
                        <label for="default"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="default" name="category" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="">Select category</option>
                            <option value="1" {{ $product->category_id == 1 ? 'selected' : '' }}>Kemeja</option>
                            <option value="2" {{ $product->category_id == 2 ? 'selected' : '' }}>Kaos</option>
                            <option value="3" {{ $product->category_id == 3 ? 'selected' : '' }}>Celana</option>
                            <option value="4" {{ $product->category_id == 4 ? 'selected' : '' }}>Jaket</option>
                        </select>
                    </div>
                </div>
                <hr class="mx-2">

                {{-- product variant --}}
                <div class="p-2 space-y-4" id="variants-wrapper">
                    @php
                        $oldVariants = old('variants', [['sku' => '', 'price' => '', 'size' => '']]);
                        // kalau tidak ada old(), minimal ada 1 variant kosong
                    @endphp

                    @foreach ($product->productVariants as $i => $variant)
                        <div
                            class="variant-block flex gap-4 border p-2 rounded-lg bg-gray-50 dark:bg-gray-700 items-center">
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">SKU
                                    Variant</label>
                                <input type="text" name="variants[{{ $i }}][sku]"
                                    class="variant-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                                    placeholder="SKU123" value="{{ $variant['sku'] }}" required />
                            </div>
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                <input type="number" step="0.01" name="variants[{{ $i }}][price]"
                                    class="variant-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                                    placeholder="100000" value="{{ $variant['price'] }}" required />
                            </div>
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Size</label>
                                <select name="variants[{{ $i }}][size]"
                                    class="variant-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                                    required>
                                    <option value="">Select size</option>
                                    <option value="S" {{ $variant['size'] == 'S' ? 'selected' : '' }}>S</option>
                                    <option value="M" {{ $variant['size'] == 'M' ? 'selected' : '' }}>M</option>
                                    <option value="L" {{ $variant['size'] == 'L' ? 'selected' : '' }}>L</option>
                                    <option value="XL" {{ $variant['size'] == 'XL' ? 'selected' : '' }}>XL</option>
                                </select>
                            </div>
                            <div class="flex gap-2 mt-6">
                                <button type="button" class="remove-variant p-2 rounded bg-red-600 text-white"
                                    title="Delete">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="m-2 w-24 p-2.5 rounded-lg mt-2 bg-blue-700 dark:text-white text-gray-900">Update</button>
                <button type="button" id="add-variant"
                    class="p-2.5 w-24 border rounded-lg dark:border-gray-600 border-gray-300 text-gray-900 dark:text-white">+
                    Variant</button>
            </div>
        </form>

        <div id="deleteModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-80 p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Hapus Variant?</h2>
                <p class="text-sm text-gray-600 dark:text-gray-300 mb-6">
                    Apakah kamu yakin ingin menghapus variant ini? Perubahan ini akan tersimpan setelah anda menekan tombol
                    update.
                </p>
                <div class="flex justify-end gap-3">
                    <button id="cancelDelete"
                        class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                        Batal
                    </button>
                    <button id="confirmDelete" class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700">
                        Hapus
                    </button>
                </div>
            </div>
        </div>

        <script>
            const variantsWrapper = document.getElementById("variants-wrapper");
            const addVariantBtn = document.getElementById("add-variant");

            let variantIndex = {{ count($oldVariants) }}; // lanjut dari jumlah old()

            function createVariantBlock(index) {
                return `
                    <div class="variant-block flex gap-4 border p-2 rounded-lg bg-gray-50 dark:bg-gray-700 items-center">
                        <div>
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">SKU Variant</label>
                        <input type="text" name="variants[${index}][sku]"
                            class="variant-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                            placeholder="SKU123" required />
                        </div>
                        <div>
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="number" step="0.01" name="variants[${index}][price]"
                            class="variant-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                            placeholder="100000" required />
                        </div>
                        <div>
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Size</label>
                        <select name="variants[${index}][size]"
                            class="variant-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:text-white" required>
                            <option value="">Select size</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                        </div>
                        <div class="flex gap-2 mt-6">
                        <button type="button" class="remove-variant p-2 rounded bg-red-600 text-white" title="Delete">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        </div>
                    </div>
                `;
            }

            addVariantBtn.addEventListener("click", () => {
                variantsWrapper.insertAdjacentHTML("beforeend", createVariantBlock(variantIndex++));
            });

            // Modal handling
            const deleteModal = document.getElementById("deleteModal");
            const cancelDelete = document.getElementById("cancelDelete");
            const confirmDelete = document.getElementById("confirmDelete");

            let targetVariant = null; // simpan variant yang mau dihapus

            variantsWrapper.addEventListener("click", (e) => {
                const btn = e.target.closest(".remove-variant");
                if (!btn) return;

                if (variantsWrapper.children.length <= 1) {
                    alert("Minimal 1 variant harus ada!");
                    return;
                }

                targetVariant = btn.closest(".variant-block");
                deleteModal.classList.remove("hidden"); // tampilkan modal
            });

            cancelDelete.addEventListener("click", () => {
                deleteModal.classList.add("hidden");
                targetVariant = null;
            });

            confirmDelete.addEventListener("click", () => {
                if (targetVariant) {
                    targetVariant.remove();
                    targetVariant = null;
                }
                deleteModal.classList.add("hidden");
            });
        </script>


    </div>
@endsection
