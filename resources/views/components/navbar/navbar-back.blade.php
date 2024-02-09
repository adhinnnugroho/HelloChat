<div class="py-4  px-2"
    x-bind:class="{
        'bg-black text-white border border-black border-b-gray-600 border-r-gray-600 ': $store.darkMode.on,
        'border border-white border-b-gray-300': !$store.darkMode.on,
    }">
    <div class="flex flex-wrap justify-between text-3xl">
        <div class="cursor-pointer" x-on:click="{{ $actions }} = false">
            <i class="fa {{ $icons }} mr-5 ml-4"></i>
            {{ $title }}
        </div>
    </div>
</div>
