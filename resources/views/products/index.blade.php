@extends('layouts.app')

@section('content')
    <div>
        <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700"
            bis_skin_checked="1">
            <div class="w-full mb-1" bis_skin_checked="1">
                <div class="mb-4" bis_skin_checked="1">
                    <nav class="flex mb-5" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                            <li class="inline-flex items-center">
                                <a href={{ route('dashboard') }}
                                    class="inline-flex items-center text-gray-700 hover:text-blue-600 dark:text-gray-300 dark:hover:text-white">
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
                                    <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500"
                                        aria-current="page">Products</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All products</h1>
                </div>
                <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700"
                    bis_skin_checked="1">
                    <div class="flex items-center mb-4 sm:mb-0" bis_skin_checked="1">
                        <form class="flex justify-center items-center" action="{{ route('products.index') }}"
                            method="GET">
                            @csrf
                            <label for="products-search" class="sr-only">Search</label>
                            <div class="relative w-48 sm:w-64 xl:w-96">
                                <input type="text" name="search" id="products-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search for products">
                            </div>
                            <button type="submit"
                                class="ms-1 p-3 rounded-lg bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600">
                                <svg height="16" width="16" viewBox="0 0 19 19"
                                    class="fill-current text-gray-500 dark:text-gray-300">
                                    <path
                                        d="m8 16c4.418278 0 8-3.581722 8-8s-3.581722-8-8-8-8 3.581722-8 8 3.581722 8 8 8zm0-2c-3.3137085 0-6-2.6862915-6-6s2.6862915-6 6-6 6 2.6862915 6 6-2.6862915 6-6 6z">
                                    </path>
                                    <path
                                        d="m12.2972351 13.7114222 4.9799555 4.919354c.3929077.3881263 1.0260608.3842503 1.4141871-.0086574.3881263-.3929076.3842503-1.0260607-.0086574-1.414187l-4.9799554-4.919354c-.3929077-.3881263-1.0260608-.3842503-1.4141871.0086573-.3881263.3929077-.3842503 1.0260608.0086573 1.4141871z">
                                    </path>
                                </svg>
                            </button>

                        </form>

                    </div>
                    <a href={{ route('products.create') }}
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
                        new product
                    </a>
                </div>
            </div>
        </div>

        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden shadow">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                                class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-all" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Kategori
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Product Name
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Penjualan
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Harga
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Stock
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @forelse ($products as $product)
                                    <tr>
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-194556" aria-describedby="checkbox-1" type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-194556" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="w-4 p-4">
                                            <div class="text-base font-semibold text-gray-900 dark:text-white">
                                                Kemeja
                                            </div>
                                        </td>
                                        <td class="p-3 flex items-center space-x-3">

                                            <img src="https://flowbite.com/docs/images/products/apple-watch.png"
                                                class="w-14 h-14 rounded object-cover">
                                            <a href={{ route('products.edit', $product->id) }} class="group">
                                                <div
                                                    class="font-semibold text-gray-900 dark:text-white group-hover:underline">
                                                    {{ $product->name }}
                                                </div>

                                                <div class="text-xs text-gray-500">SKU Induk: {{ $product->sku ?? '-' }}
                                                </div>
                                                <div class="text-xs text-gray-500">ID Produk: {{ $product->id }}</div>
                                            </a>
                                        </td>
                                        <td class="p-3 text-gray-900 dark:text-white">10</td>
                                        <td class="p-3 text-gray-900 dark:text-white">
                                            Rp{{ number_format($product->min_price) }} -
                                            Rp{{ number_format($product->max_price) }}
                                        </td>
                                        <td class="p-3 text-gray-900 dark:text-white">10</td>
                                        <td class="p-4 space-x-2 whitespace-nowrap">

                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                    </path>
                                                    <path fill-rule="evenodd"
                                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Update
                                            </a>
                                            <button type="button" id="deleteProductButton"
                                                data-drawer-target="drawer-delete-product-default"
                                                data-drawer-show="drawer-delete-product-default"
                                                aria-controls="drawer-delete-product-default"
                                                data-drawer-placement="right"
                                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Delete item
                                            </button>
                                        </td>
                                    </tr>

                                    <tr x-show="open" class="bg-gray-50 dark:bg-gray-700">
                                        <td colspan="7" class="p-4">
                                            <table class="w-full text-sm">
                                                <thead>
                                                    <tr class="border-b dark:border-gray-500 border-gray-200">
                                                        <th class="p-2 text-left text-gray-700 dark:text-white">SKU</th>
                                                        <th class="p-2 text-left text-gray-700 dark:text-white">Penjualan
                                                        </th>
                                                        <th class="p-2 text-left text-gray-700 dark:text-white">Size
                                                        </th>
                                                        <th class="p-2 text-left text-gray-700 dark:text-white">Harga
                                                        </th>
                                                        <th class="p-2 text-left text-gray-700 dark:text-white">Stok
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($product->productVariants as $variant)
                                                        <tr
                                                            class="border-b text-gray-500 dark:text-gray-400 dark:border-gray-500 border-gray-200">
                                                            <td class="p-2">{{ $variant->sku ?? '-' }}</td>
                                                            <td class="p-2">2</td>
                                                            <td class="p-2">{{ $variant->size }}</td>
                                                            <td class="p-2">Rp{{ number_format($variant->price) }}</td>
                                                            <td class="p-2">
                                                                {{ $variant->stock }}
                                                                @if ($variant->stock == 0)
                                                                    <span
                                                                        class="ml-2 px-2 py-1 text-xs bg-gray-200 rounded">{{ $variant->stock ?? '0' }}
                                                                        | Habis</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="p-4 text-center text-gray-500 dark:text-gray-400">
                                            Tidak ada data
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div>
            {{ $products->onEachSide(1)->links('vendor.pagination.custom') }}
        </div>


        <!-- Edit Product Drawer -->
        <div id="drawer-update-product-default"
            class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800"
            tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
            <h5 id="drawer-label"
                class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
                Update Product</h5>
            <button type="button" data-drawer-dismiss="drawer-update-product-default"
                aria-controls="drawer-update-product-default"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <form action="#">
                <div class="space-y-4">
                    <div>
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="title" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="Education Dashboard" placeholder="Type product name" required="">
                    </div>
                    <div>
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Technology</label>
                        <select id="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected="">Flowbite</option>
                            <option value="RE">React</option>
                            <option value="AN">Angular</option>
                            <option value="VU">Vue JS</option>
                        </select>
                    </div>
                    <div>
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="number" name="price" id="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="2999" placeholder="$149" required="">
                    </div>
                    <div>
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter event description here">Start developing with an open-source library of over 450+ UI components, sections, and pages built with the utility classes from Tailwind CSS and designed in Figma.</textarea>
                    </div>
                    <div>
                        <label for="discount"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discount</label>
                        <select id="discount"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected="">No</option>
                            <option value="5">5%</option>
                            <option value="10">10%</option>
                            <option value="20">20%</option>
                            <option value="30">30%</option>
                            <option value="40">40%</option>
                            <option value="50">50%</option>
                        </select>
                    </div>
                </div>
                <div class="bottom-0 left-0 flex justify-center w-full pb-4 mt-4 space-x-4 sm:absolute sm:px-4 sm:mt-0">
                    <button type="submit"
                        class="w-full justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Update
                    </button>
                    <button type="button"
                        class="w-full justify-center text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                        <svg aria-hidden="true" class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Delete
                    </button>
                </div>
            </form>
        </div>


        <!-- Delete Product Drawer -->
        <div id="drawer-delete-product-default"
            class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800"
            tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
            <h5 id="drawer-label"
                class="inline-flex items-center text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
                Delete item</h5>
            <button type="button" data-drawer-dismiss="drawer-delete-product-default"
                aria-controls="drawer-delete-product-default"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <svg class="w-10 h-10 mt-8 mb-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="mb-6 text-lg text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?
            </h3>
            <a href="#"
                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-900">
                Yes, I'm sure
            </a>
            <a href="#"
                class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                data-drawer-hide="drawer-delete-product-default">
                No, cancel
            </a>
        </div>


        <!-- Add Product Drawer -->
        <div id="drawer-create-product-default"
            class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800"
            tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
            <h5 id="drawer-label"
                class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
                New Product</h5>
            <button type="button" data-drawer-dismiss="drawer-create-product-default"
                aria-controls="drawer-create-product-default"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <form action="#">
                <div class="space-y-4">
                    <div>
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="title" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Type product name" required="">
                    </div>

                    <div>
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="number" name="price" id="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="$2999" required="">
                    </div>
                    <div>
                        <label for="category-create"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Technology</label>
                        <select id="category-create"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected="">Select category</option>
                            <option value="FL">Flowbite</option>
                            <option value="RE">React</option>
                            <option value="AN">Angular</option>
                            <option value="VU">Vue</option>
                        </select>
                    </div>
                    <div>
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter event description here"></textarea>
                    </div>
                    <div>
                        <label for="discount-create"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discount</label>
                        <select id="discount-create"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected="">No</option>
                            <option value="5">5%</option>
                            <option value="10">10%</option>
                            <option value="20">20%</option>
                            <option value="30">30%</option>
                            <option value="40">40%</option>
                            <option value="50">50%</option>
                        </select>
                    </div>
                    <div class="bottom-0 left-0 flex justify-center w-full pb-4 space-x-4 md:px-4 md:absolute">
                        <button type="submit"
                            class="text-white w-full justify-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Add product
                        </button>
                        <button type="button" data-drawer-dismiss="drawer-create-product-default"
                            aria-controls="drawer-create-product-default"
                            class="inline-flex w-full justify-center text-gray-500 items-center bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            <svg aria-hidden="true" class="w-5 h-5 -ml-1 sm:mr-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Cancel
                        </button>
                    </div>
            </form>
        </div>
    </div>
@endsection
