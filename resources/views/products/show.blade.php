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
                                        aria-current="page">{{ $product->name }}</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Product Detail</h1>
                </div>

            </div>
        </div>
        <div
            class="border-b border-gray-200 dark:border-gray-700 flex flex-col md:flex-row p-4 gap-6 justify-center items-start">

            <!-- Product Image -->
            <div
                class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl shadow-sm w-full md:max-w-sm">
                <div class="border-b border-gray-200 dark:border-gray-700 px-4 py-3">
                    <h1 class="text-lg font-semibold text-gray-900 sm:text-xl dark:text-white">Product Image</h1>
                </div>
                <div class="flex justify-center items-center p-4">
                    <img class="max-h-96 rounded-lg object-contain shadow-md"
                        src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}">
                </div>
            </div>

            <!-- Product Details -->
            <div
                class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl shadow-sm w-full md:max-w-2xl">
                <div class="border-b border-gray-200 dark:border-gray-700 px-4 py-3">
                    <h1 class="text-lg font-semibold text-gray-900 sm:text-xl dark:text-white">{{ $product->name }}</h1>
                </div>

                <div class="px-4 py-3 ">
                    <table class="w-full text-sm text-gray-700 dark:text-gray-300">
                        <tbody>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="py-2 font-medium">Name</td>
                                <td class="py-2">{{ $product->name }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="py-2 font-medium">SKU</td>
                                <td class="py-2">{{ $product->sku }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="py-2 font-medium">Category</td>
                                <td class="py-2">{{ $product->category->name ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="py-2  font-medium">QR Code</td>
                                <td class="py-2 ">{!! $qrCode !!}</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr class="border-gray-200 dark:border-gray-700 pb-4">

                    <!-- Product Variant -->
                    <div>
                        <h2 class="text-base font-semibold text-gray-900 dark:text-white mb-3">Product Variants</h2>
                        <div class="grid gap-3">
                            @foreach ($product->productVariants as $item)
                                <div
                                    class="flex flex-col sm:flex-row sm:items-center justify-between p-3 border border-gray-200 dark:border-gray-700 rounded-xl bg-white dark:bg-gray-900 hover:shadow-md transition">
                                    <div class="text-sm font-medium text-gray-800 dark:text-gray-200">
                                        {{ $item->size }}
                                    </div>
                                    <div class="flex flex-wrap gap-4 text-sm text-gray-600 dark:text-gray-400">
                                        <span
                                            class="font-semibold text-green-600 dark:text-green-400">Rp{{ number_format($item->price) }}</span>
                                        <span>SKU: {{ $item->sku }}</span>
                                        <span
                                            class="{{ ($item->stockBalance?->quantity ?? 0) > 0 ? 'text-blue-600 dark:text-blue-400' : 'text-red-500 dark:text-red-400 font-semibold' }}">
                                            Stock: {{ $item->stockBalance?->quantity ?? 0 }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
