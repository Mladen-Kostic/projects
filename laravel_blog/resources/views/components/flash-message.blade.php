@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show" class="fixed bottom-0 left-1/2 transform -translate-x-1/2 bg-black text-white px-8 py-3 mb-20 rounded-md">
        <p>{{ session('message') }}</p>
    </div>
@endif