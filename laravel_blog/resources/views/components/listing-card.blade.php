@props(['listing'])

<x-card>
    <div class="flex md:justify-center">
    <a class="w-1/2" href="/listings/{{ $listing->id }}">
        <img
            class="hidden w-full rounded-md md:block"
            src="{{$listing->post_image ? asset('storage/'.$listing->post_image) : asset('/images/no-image.png')}}"
            alt=""
        />
    </a>
    <!-- <img
            class="hidden w-1/2 rounded-md md:block"
            src="{{$listing->logo ? asset('storage/'.$listing->logo) : asset('/images/no-image.png')}}"
            alt=""
        /> -->
    </div>
    <div class="h-full md:justify-center">
        <h3 class="text-2xl">
            <a href="/listings/{{ $listing->id }}">{{ $listing->title }}</a>
        </h3>
        <div class="mt-4">
            <x-listing-tags :tagsCsv="$listing->tags" />
        </div>
        <div class="mt-4">
            {{ substr($listing->content, 0, 100).'...' }}
        </div>
        <a href="/listings/{{ $listing->id }}"><b>Read More</b></a>
    </div>
</x-card>