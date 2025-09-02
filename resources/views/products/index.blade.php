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
                            <div>
                                <div class="flex items-center mb-2">
                                    <input type="checkbox" name="include_archived" id="include-archived" value="1"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
                                        {{ request('include_archived') ? 'checked' : '' }}>
                                    <label for="include-archived"
                                        class="ms-2 text-sm text-gray-700 dark:text-gray-300">Include
                                        Archived</label>
                                </div>
                                <label for="products-search" class="sr-only">Search</label>
                                <div class="relative w-48 sm:w-64 xl:w-96">
                                    <input type="text" name="search" id="products-search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Search for products" value="{{ request('search') }}">
                                </div>
                            </div>

                            <button type="submit"
                                class="p-2.5 ms-2 text-sm mt-7 font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span>
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

        @if (session('success'))
            <div id="successBox"
                class="fixed top-5 mt-16 right-5 w-96 max-w-full bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-lg opacity-0 transform translate-y-[-20px] transition-all duration-500 ease-in-out">
                <div class="flex items-start">
                    <!-- Icon -->
                    <svg class="w-6 h-6 text-green-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <!-- Message -->
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

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
                                    <tr class="{{ $product->is_archived ? 'bg-red-200 dark:bg-red-900/80' : '' }}">
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

                                            <img src="{{ asset('storage/' . $product->photo) }}"
                                                class="w-14 h-14 rounded object-cover">
                                            <a href={{ route('products.show', $product->slug) }} class="group">
                                                <div
                                                    class="font-semibold text-gray-900 dark:text-white group-hover:underline">
                                                    {{ $product->name }}
                                                </div>

                                                <div class="text-xs text-gray-500">SKU Induk: {{ $product->sku ?? '-' }}
                                                </div>
                                                <div class="text-xs text-gray-500">ID Produk: {{ $product->id }}</div>
                                            </a>
                                        </td>
                                        <td class="p-3 text-gray-900 dark:text-white">
                                            {{ $product->total_quantity_sold }}
                                        </td>
                                        <td class="p-3 text-gray-900 dark:text-white">
                                            Rp{{ number_format($product->min_price) }} -
                                            Rp{{ number_format($product->max_price) }}
                                        </td>
                                        <td class="p-3 text-gray-900 dark:text-white">
                                            {{ $product->total_stock }}
                                        </td>
                                        <td class="p-4 space-x-2 whitespace-nowrap">
                                            @if (!$product->is_archived)
                                                <a href={{ route('products.show', $product->slug) }}
                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">

                                                    <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.412 4.5 12 4.5c4.588 0 8.577 3.01 9.964 7.183.07.207.07.431 0 .639C20.577 16.49 16.588 19.5 12 19.5c-4.588 0-8.577-3.01-9.964-7.183z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>
                                                </a>
                                                <a href="{{ route('products.edit', $product->slug) }}"
                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:focus:ring-yellow-800">

                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                        </path>
                                                        <path fill-rule="evenodd"
                                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>

                                                </a>
                                                <button type="button" id="archiveProductButton"
                                                    data-drawer-target="drawer-archive-product-default-{{ $product->id }}"
                                                    data-drawer-show="drawer-archive-product-default-{{ $product->id }}"
                                                    aria-controls="drawer-archive-product-default-{{ $product->id }}"
                                                    data-drawer-placement="right"
                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#FFFFFF"
                                                        class="w-4 h-4" viewBox="0 0 24 24">
                                                        <path
                                                            d="m21.706 5.292-2.999-2.999A.996.996 0 0 0 18 2H6a.996.996 0 0 0-.707.293L2.294 5.292A.994.994 0 0 0 2 6v13c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6a.994.994 0 0 0-.294-.708zM6.414 4h11.172l1 1H5.414l1-1zM4 19V7h16l.002 12H4z" />
                                                        <path d="M14 9h-4v3H7l5 5 5-5h-3z" />
                                                    </svg>
                                                </button>
                                            @else
                                                <button type="button" id="restoreProductButton"
                                                    data-drawer-target="drawer-restore-product-default-{{ $product->id }}"
                                                    data-drawer-show="drawer-restore-product-default-{{ $product->id }}"
                                                    aria-controls="drawer-restore-product-default-{{ $product->id }}"
                                                    data-drawer-placement="right"
                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800">

                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M4.52185 7H7C7.55229 7 8 7.44772 8 8C8 8.55229 7.55228 9 7 9H3C1.89543 9 1 8.10457 1 7V3C1 2.44772 1.44772 2 2 2C2.55228 2 3 2.44772 3 3V5.6754C4.26953 3.8688 6.06062 2.47676 8.14852 1.69631C10.6633 0.756291 13.435 0.768419 15.9415 1.73041C18.448 2.69239 20.5161 4.53782 21.7562 6.91897C22.9963 9.30013 23.3228 12.0526 22.6741 14.6578C22.0254 17.263 20.4464 19.541 18.2345 21.0626C16.0226 22.5842 13.3306 23.2444 10.6657 22.9188C8.00083 22.5931 5.54702 21.3041 3.76664 19.2946C2.20818 17.5356 1.25993 15.3309 1.04625 13.0078C0.995657 12.4579 1.45216 12.0088 2.00445 12.0084C2.55673 12.0079 3.00351 12.4566 3.06526 13.0055C3.27138 14.8374 4.03712 16.5706 5.27027 17.9625C6.7255 19.605 8.73118 20.6586 10.9094 20.9247C13.0876 21.1909 15.288 20.6513 17.0959 19.4075C18.9039 18.1638 20.1945 16.3018 20.7247 14.1724C21.2549 12.043 20.9881 9.79319 19.9745 7.8469C18.9608 5.90061 17.2704 4.3922 15.2217 3.6059C13.173 2.8196 10.9074 2.80968 8.8519 3.57803C7.11008 4.22911 5.62099 5.40094 4.57993 6.92229C4.56156 6.94914 4.54217 6.97505 4.52185 7Z"
                                                            fill="#fff" />
                                                    </svg>

                                                </button>
                                                <button type="button" id="deleteProductButton"
                                                    data-drawer-target="drawer-delete-product-default-{{ $product->id }}"
                                                    data-drawer-show="drawer-delete-product-default-{{ $product->id }}"
                                                    aria-controls="drawer-delete-product-default-{{ $product->id }}"
                                                    data-drawer-placement="right"
                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>

                                                </button>
                                            @endif

                                        </td>
                                    </tr>

                                    <tr x-show="open"
                                        class="{{ $product->is_archived ? 'bg-orange-200 dark:bg-orange-900/60' : 'bg-gray-50 dark:bg-gray-700' }}">
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
                                                            <td class="p-2">
                                                                {{ $variant->total_quantity_sold }}
                                                            </td>
                                                            <td class="p-2">{{ $variant->size }}</td>
                                                            <td class="p-2">Rp{{ number_format($variant->price) }}</td>
                                                            <td class="p-2">
                                                                {{ $variant->stockBalance?->quantity ?? 0 }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>

                                    <!-- Restore Product Drawer -->
                                    <div id="drawer-restore-product-default-{{ $product->id }}"
                                        class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800"
                                        tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
                                        <h5 id="drawer-label"
                                            class="inline-flex items-center text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
                                            Restore item</h5>
                                        <button type="button"
                                            data-drawer-dismiss="drawer-restore-product-default-{{ $product->id }}"
                                            aria-controls="drawer-restore-product-default-{{ $product->id }}"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close menu</span>
                                        </button>
                                        <svg class="w-10 h-10 mt-8 mb-4 text-green-600" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <h3 class="mb-3 text-lg text-gray-500 dark:border-gray-600 rounded-lg">Are you sure
                                            you want
                                            to
                                            restore this product?
                                        </h3>
                                        <div class="border border-gray-200 dark:border-gray-600 p-2.5 rounded-lg mb-6 ">
                                            <h1
                                                class="font-semibold text-gray-900  dark:text-white dark:border-gray-600 mb-3">
                                                {{ $product->name }}</h1>
                                            <ul>
                                                @foreach ($product->productVariants as $variant)
                                                    <li class="list-disc ml-4 text-gray-500 dark:text-gray-400">
                                                        <div class="flex items-center">
                                                            <span
                                                                class="text-sm font-medium text-gray-900 dark:text-white">
                                                                {{ $variant->sku . ' - ' . $variant->size }}
                                                            </span>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <form action="{{ route('products.restore', $product->slug) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-green-900">
                                                Yes, sure</button>
                                        </form>

                                        <a href="#"
                                            class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                                            data-drawer-hide="drawer-restore-product-default-{{ $product->id }}">
                                            No, cancel
                                        </a>
                                    </div>

                                    <!-- Archive Product Drawer -->
                                    <div id="drawer-archive-product-default-{{ $product->id }}"
                                        class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800"
                                        tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
                                        <h5 id="drawer-label"
                                            class="inline-flex items-center text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
                                            Archive item</h5>
                                        <button type="button"
                                            data-drawer-dismiss="drawer-archive-product-default-{{ $product->id }}"
                                            aria-controls="drawer-archive-product-default-{{ $product->id }}"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close menu</span>
                                        </button>
                                        <svg class="w-10 h-10 mt-8 mb-4 text-red-600" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <h3 class="mb-3 text-lg text-gray-500 dark:border-gray-600 rounded-lg">Are you sure
                                            you want
                                            to
                                            archive this product?
                                        </h3>
                                        <div class="border border-gray-200 dark:border-gray-600 p-2.5 rounded-lg mb-6 ">
                                            <h1
                                                class="font-semibold text-gray-900  dark:text-white dark:border-gray-600 mb-3">
                                                {{ $product->name }}</h1>
                                            <ul>
                                                @foreach ($product->productVariants as $variant)
                                                    <li class="list-disc ml-4 text-gray-500 dark:text-gray-400">
                                                        <div class="flex items-center">
                                                            <span
                                                                class="text-sm font-medium text-gray-900 dark:text-white">
                                                                {{ $variant->sku . ' - ' . $variant->size }}
                                                            </span>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <form action="{{ route('products.archive', $product->slug) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-900">
                                                Yes, sure</button>
                                        </form>

                                        <a href="#"
                                            class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                                            data-drawer-hide="drawer-archive-product-default-{{ $product->id }}">
                                            No, cancel
                                        </a>
                                    </div>

                                    <!-- Delete Product Drawer -->
                                    <div id="drawer-delete-product-default-{{ $product->id }}"
                                        class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800"
                                        tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
                                        <h5 id="drawer-label"
                                            class="inline-flex items-center text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
                                            Delete item</h5>
                                        <button type="button"
                                            data-drawer-dismiss="drawer-delete-product-default-{{ $product->id }}"
                                            aria-controls="drawer-delete-product-default-{{ $product->id }}"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close menu</span>
                                        </button>
                                        <svg class="w-10 h-10 mt-8 mb-4 text-red-600" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <h3 class="mb-3 text-lg text-gray-500 dark:border-gray-600 rounded-lg">Are you sure
                                            you want
                                            to
                                            delete this product?
                                        </h3>
                                        <div class="border border-gray-200 dark:border-gray-600 p-2.5 rounded-lg mb-6 ">
                                            <h1
                                                class="font-semibold text-gray-900  dark:text-white dark:border-gray-600 mb-3">
                                                {{ $product->name }}</h1>
                                            <ul>
                                                @foreach ($product->productVariants as $variant)
                                                    <li class="list-disc ml-4 text-gray-500 dark:text-gray-400">
                                                        <div class="flex items-center">
                                                            <span
                                                                class="text-sm font-medium text-gray-900 dark:text-white">
                                                                {{ $variant->sku . ' - ' . $variant->size }}
                                                            </span>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <form action="{{ route('products.destroy', $product->slug) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-900">
                                                Yes, sure</button>
                                        </form>

                                        <a href="#"
                                            class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                                            data-drawer-hide="drawer-delete-product-default-{{ $product->id }}">
                                            No, cancel
                                        </a>
                                    </div>

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

        <script>
            document.addEventListener("DOMContentLoaded", function() {

                const successBox = document.getElementById("successBox");
                if (successBox) {
                    setTimeout(() => {
                        successBox.classList.remove("opacity-0", "translate-y-[-20px]");
                        successBox.classList.add("opacity-100", "translate-y-0");
                    }, 100); // animasi muncul

                    setTimeout(() => {
                        successBox.classList.add("opacity-0", "translate-y-[-20px]");
                        setTimeout(() => successBox.remove(), 500); // hilang smooth
                    }, 4000); // auto close 4 detik
                }
            });
        </script>

    </div>
@endsection
