@extends('layouts.master')
@section('title')
    Customer Create
@endsection
@section('content')
    <div class="w-full max-w-md mx-auto bg-white shadow-lg rounded-lg p-8">
        <form class="max-w-sm mx-auto" action="{{ route('customer.store') }}" method="POST">
            @csrf
            <div class="mb-5">
                <h1 class="text-center text-2xl">Create Customers</h1>
            </div>
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                    Name
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
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">
                    Phone
                </label>
                <input type="text" id="phone" name="phone"
                    class="@error('phone')
                    border-red-600
                @enderror
         border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="09,123123" />
                @error('phone')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">
                    Email
                </label>
                <input type="text" id="email" name="email"
                    class="@error('email')
                    border-red-600
                @enderror
         border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="1,2,3, etc" />
                @error('email')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            @foreach ($posts as $post)
                <div class="flex items-center mb-2">
                    <input id="post_id" type="checkbox" value="{{ $post->id }}" name="post_ids[]"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="posts" class="ms-2 text-sm font-medium text-gray-900">{{ $post->title }}
                </div>
            @endforeach
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
@endsection
