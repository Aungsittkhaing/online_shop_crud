@extends('layouts.master')
@section('title')
    Create Posts
@endsection
@section('content')
    <div class="w-full max-w-md mx-auto bg-white shadow-lg rounded-lg p-8">
        <form class="max-w-sm mx-auto" action="{{ route('post.store') }}" method="POST">
            @csrf
            <div class="mb-5">
                <h1 class="text-center text-2xl">Create Post</h1>
            </div>
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                    Post Title
                </label>
                <input type="text" id="name" name="title"
                    class="
                @error('title')
                    border-red-600
                @enderror
             border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="post name" />
                @error('title')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            @foreach ($customers as $customer)
                <div class="flex items-center mb-2">
                    <input id="user_id" type="checkbox" value="{{ $customer->id }}" name="customer_ids[]"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="users" class="ms-2 text-sm font-medium text-gray-900">{{ $customer->name }}
                </div>
            @endforeach

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
@endsection
