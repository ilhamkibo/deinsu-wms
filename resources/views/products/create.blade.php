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
        <form class="border-b border-gray-200 dark:border-gray-700 grid grid-cols-1 xl:grid-cols-2 p-4 gap-4">
            @csrf
            <div class="bg-gray-50 dark:bg-gray-800 p-2 border border-gray-200 dark:border-gray-700 rounded-md">
                <div class="flex flex-col gap-4">
                    <div class="">
                        <h1 class="text-base font-semibold text-gray-900 sm:text-xl dark:text-white">Upload Image</h1>
                    </div>
                    <div class="flex justify-center">
                        <img src="https://flowbite-admin-dashboard.vercel.app/images/products/ipad.png" alt="">
                    </div>
                    <div>
                        <input type="file"
                            class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="file_input" required mimetype="image/*">
                    </div>
                </div>
            </div>
            <div>Upload form</div>
        </form>
    </div>
@endsection
