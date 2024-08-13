@extends('layouts.master')
@section('title')
    Detail Product
@endsection
@section('content')
    <div class="py-12 w-full max-w-md mx-auto bg-white shadow-lg rounded-lg p-8">
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800">
            <div class="mb-5">
                <h1 class="text-center text-white text-2xl">Product Detail</h1>
            </div>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Product Name = {{ $product->name }}
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Product Price = {{ $product->price }}
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Product Stock = {{ $product->stock }}
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Status = {{ $product->status }}
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Category = {{ $product->category->name }}
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                product Description = {{ $product->description }}
            </p>
            <a href="{{ route('product.index') }}"
                class="focus:outline-none text-white bg-red-400 hover:bg-red-500 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-red-900">
                Back
            </a>
        </div>
    </div>
@endsection
