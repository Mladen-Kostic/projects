<section
    class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4"
>

    <div class="z-10">
        <h1 class="text-6xl font-bold uppercase text-white">
            welcome <span class="text-black">{{ auth()->user()->name }}</span>
        </h1>
        <p class="text-2xl text-gray-200 font-bold my-4">
            What's on your mind today?
        </p>
        <div>
            <a
                href="/listings/create"
                class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
                >New Post</a
            >
        </div>
    </div>
</section>