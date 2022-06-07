@extends('layout')

@section('content')
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Create Post</h2>
        <p class="mb-4">What would you like to share?</p>
        </header>

        <form method="POST" action="/listings" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
            <label for="title" class="inline-block text-lg mb-2">Post Title</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
            value="{{old('title')}}" />

            @error('title')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="tags" class="inline-block text-lg mb-2">
            Tags (Comma Separated)
            </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
            value="{{old('tags')}}" />

            @error('tags')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="post_image" class="inline-block text-lg mb-2">
            Post Image
            </label>
            <input type="file" class="border border-gray-200 rounded p-2 w-full" name="post_image" />

            @error('post_image')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="content" class="inline-block text-lg mb-2">
            Content
            </label>
            <textarea class="border border-gray-200 rounded p-2 w-full" name="content" rows="10"
            >{{old('content')}}</textarea>

            @error('content')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
            Create Post
            </button>

            <a href="/" class="text-black ml-4"> Back </a>
        </div>
        </form>
    </x-card>
@endsection