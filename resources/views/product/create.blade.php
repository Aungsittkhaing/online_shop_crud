@extends('layouts.master')
@section('title')
    Create Product
@endsection
@section('content')
    <div class="w-full max-w-md mx-auto bg-white shadow-lg rounded-lg p-8">
        <form class="max-w-sm mx-auto" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <h1 class="text-center text-2xl">Create Product</h1>
            </div>
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                    Product Name
                </label>
                <input type="text" id="name" name="name"
                    class="
                    @error('name')
                        border-red-600
                    @enderror
             border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="phone, laptop, etc" />
                @error('name')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900">
                    Price
                </label>
                <input type="text" id="price" name="price"
                    class="@error('price')
                        border-red-600
                    @enderror
             border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="kyat" />
                @error('price')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">
                    Stock
                </label>
                <input type="text" id="stock" name="stock"
                    class="@error('stock')
                        border-red-600
                    @enderror
             border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="1,2,3, etc" />
                @error('stock')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5 flex">
                <div class="flex items-center me-2">
                    <input id="available" type="radio" value="available" name="status"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="available" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Available
                    </label>
                </div>
                <div class="flex items-center">
                    <input id="unavailable" type="radio" value="unavailable" name="status"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="unavailable" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Unavailable
                    </label>
                </div>
            </div>
            @error('status')
                <div class="mb-5">
                    <span class="text-red-600">{{ $message }}</span>
                </div>
            @enderror
            <div class="mb-5">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Select a Category
                </label>
                <select id="category" name="category_id"
                    class="
                    @error('category_id')
                        border-red-600
                    @enderror
                    bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="{{ old('category_id') }}">Choose a Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
                {{-- {{ $categories }} --}}
            </div>
            <div class="mb-5">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900">
                    Image
                </label>
                <input type="file" id="image" name="image"
                    class="@error('image')
                        border-red-600
                    @enderror
             border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                @error('image')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">
                    Description
                </label>
                <textarea id="description" rows="4" name="description"
                    class="@error('description')
                        border-red-600
                    @enderror
            block p-2.5 w-full text-sm text-gray-900 rounded-lg border focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Leave a comment..."></textarea>
                @error('description')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
@endsection
