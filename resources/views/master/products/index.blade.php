@extends('layouts.app')

@section('content')
    <div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4">


            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3">Product Name</th>
                            <th class="px-6 py-3">Category</th>
                            <th class="px-6 py-3">Color</th>
                            <th class="px-6 py-3">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            @foreach ($product->productVariants as $variant)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $product->name }}
                                    </td>
                                    <td class="px-6 py-4">Kemeja</td>
                                    <td class="px-6 py-4">{{ $variant->color }}</td>
                                    <td class="px-6 py-4">${{ number_format($variant->price, 2) }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        @foreach ($products as $product)
            <div>{{ $product->name }}</div>
        @endforeach
    </div>
@endsection
