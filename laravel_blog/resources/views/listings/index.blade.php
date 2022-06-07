@extends('layout')

@section('content')
    @auth
        @include('partials._hero2')
    @else
        @include('partials._hero')
    @endauth

    @include('partials._search')

    <div class="lg:grid lg:grid-cols-1 gap-4 space-y-4 md:space-y-0 mx-4">

        @unless(count($listings)==0)

            @foreach($listings as $listing)
                <x-listing-card :listing="$listing" />
            @endforeach
        @else
            <hr>
            <div class="flex text-4xl justify-center font-bold uppercase">No posts found.</div>
            <hr>

        @endunless

    </div>

    <div class="mt-6 p-4">
        {{ $listings->links() }}
    </div>

@endsection