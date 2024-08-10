@extends('layouts.master')
@section('title')
    Edit Category
@endsection
@section('content')
    <div class="w-full max-w-md mx-auto bg-white shadow-lg rounded-lg p-8">
        <form class="max-w-sm mx-auto" action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="mb-5">
                <h1 class="text-center text-2xl">Edit Category</h1>
            </div>
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                    Category Name
                </label>
                <input type="text" id="name" name="name" value="{{ $category->name }}"
                    class="
             border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="business type or economics type" />

            </div>
            <div class="mb-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">
                    Description
                </label>
                <textarea id="description" rows="4" name="description"
                    class="
            block p-2.5 w-full text-sm text-gray-900 rounded-lg border focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Leave a comment...">{{ $category->description }}</textarea>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
        </form>
    </div>
@endsection
