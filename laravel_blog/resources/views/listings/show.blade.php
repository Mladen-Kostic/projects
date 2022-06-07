@extends('layout')

@section('content')
@include('partials._search')

    <a href="/" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    @auth
        @if($listing->user_id === auth()->user()->id)
            <div class="mt-4 ml-4 p-2 flex space-x-6">
                <a href="/listings/{{ $listing->id }}/edit">
                    <i class="fa-solid fa-pencil"></i> Edit
                </a>
                <form action="/listings/{{ $listing->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                </form>
            </div>
        @endif
    @endauth

    <div class="mx-4">
        <x-card class="p-24">
            <div
                class="flex flex-col items-center justify-center text-center"
            >
                <img
                    class="w-1/2 mr-6 mb-6 rounded-md"
                    src="{{$listing->post_image ? asset('storage/'.$listing->post_image) : asset('/images/no-image.png')}}"
                    alt=""
                />

                <h3 class="text-3xl font-bold mb-4">{{ $listing->title }}</h3>
                
                <x-listing-tags :tagsCsv="$listing->tags" />
                <div class="border border-gray-200 w-full my-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Post Content
                    </h3>
                    <div class="text-lg space-y-6">
                        {{ $listing->content }}

                        <a
                            href="mailto:{{$user::find($listing->user_id)->email}}"
                            class="block bg-laravel text-white mt-6 py-2 px-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-envelope"></i>
                            Contact {{ $user::find($listing->user_id)->name }}</a
                        >
                        
                    </div>
                </div>
            </div>
        </x-card>
    </div>

@endsection