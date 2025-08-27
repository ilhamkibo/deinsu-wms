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
                                    <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500"
                                        aria-current="page">Create</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Create product</h1>
                </div>

            </div>
        </div>
        @if ($errors->any())
            <div class="text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action={{ route('products.store') }} method="POST" enctype="multipart/form-data"
            class="border-b border-gray-200 dark:border-gray-700 flex flex-col md:flex-row p-4 gap-4 justify-center items-center md:items-start">
            @csrf
            {{-- Product image --}}
            <div
                class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md sm:max-w-lg w-full space-y-4">
                <div class="border-b border-gray-200 dark:border-gray-700 p-2">
                    <h1 class="text-base font-semibold text-gray-900 sm:text-xl dark:text-white">Upload Image</h1>
                </div>
                <div class="flex justify-center h-96 p-1">
                    <!-- Preview image -->
                    <img id="preview-image" src="https://flowbite-admin-dashboard.vercel.app/images/illustrations/404.svg"
                        alt="Preview" class="max-h-96 rounded-lg  object-contain" />
                </div>
                <div class="p-2">
                    <input type="file" accept="image/*" name="image"
                        class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer 
                           bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 
                           dark:border-gray-600 dark:placeholder-gray-400"
                        id="file_input" required>
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
                            placeholder="Kemeja Adem" required />
                    </div>
                    <div class="">
                        <label for="sku"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SKU</label>
                        <input type="text" id="sku" name="sku"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="XXX" required />
                    </div>
                    <div>
                        <label for="default"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="default" name="category" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="">Select category</option>
                            <option value="1">Kemeja</option>
                            <option value="2">Kaos</option>
                            <option value="3">Celana</option>
                            <option value="4">Jaket</option>
                        </select>
                    </div>
                </div>
                <hr class="mx-2">

                {{-- product variant --}}
                <div class="p-2 space-y-4" id="variants-wrapper">
                    {{-- <div class="grid grid-cols-3 gap-4">
                        <div>
                            <label for="variant-sku"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">SKU
                                Variant</label>
                            <input type="text" id="variant-sku" name="variant-sku"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Kemeja Adem" required />
                        </div>
                        <div class="">
                            <label for="price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                            <input type="text" id="price" name="price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="XXX" required />
                        </div>
                        <div>
                            <label for="default"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size</label>
                            <select id="default"
                                class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Select size</option>
                                <option value="1">S</option>
                                <option value="2">L</option>
                                <option value="3">M</option>
                                <option value="4">XL</option>
                            </select>
                        </div>
                    </div> --}}
                </div>
                <button class="m-2 w-24 p-2.5 rounded-lg mt-2 bg-blue-700 dark:text-white text-gray-900">Submit</button>
                <button type="button" id="add-variant"
                    class="p-2.5 w-24 border rounded-lg dark:border-gray-600 border-gray-300 text-gray-900 dark:text-white">+
                    Variant</button>
            </div>
        </form>

        <script>
            const variantsWrapper = document.getElementById("variants-wrapper");
            const addVariantBtn = document.getElementById("add-variant");

            function createVariantBlock(index) {
                return `
                    <div class="flex gap-4 border p-2 rounded-lg bg-gray-50 dark:bg-gray-700 items-center">
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
                                <!-- Icon trash -->
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                `;
            }

            let variantIndex = 0;

            function ensureAtLeastOneVariant() {
                if (variantsWrapper.children.length === 0) {
                    variantsWrapper.insertAdjacentHTML("beforeend", createVariantBlock(variantIndex++));
                }
            }

            ensureAtLeastOneVariant();

            addVariantBtn.addEventListener("click", () => {
                variantsWrapper.insertAdjacentHTML("beforeend", createVariantBlock(variantIndex++));
            });

            // Delegasi event
            variantsWrapper.addEventListener("click", (e) => {
                const btn = e.target.closest("button");
                if (!btn) return;

                if (btn.classList.contains("remove-variant")) {
                    if (variantsWrapper.children.length > 1) {
                        btn.closest(".grid").remove();
                    } else {
                        alert("Minimal 1 variant harus ada!");
                    }
                }
            });
        </script>


    </div>
@endsection
