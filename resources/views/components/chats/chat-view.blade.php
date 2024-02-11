@props(['livewire_actions' => ''])


<div class="flex flex-row py-4 px-2 justify-center items-center border-b-2 cursor-pointer" {{ $attributes }}
    x-bind:class="{
        'lg:border-gray-600': $store.darkMode.on,
        'lg:border-gray-300 ': !$store.darkMode.on
    }">
    <div class="w-1/4">
        <img src="{{ $image }}" class="object-cover h-12 w-12 ml-5 rounded-full" alt="" />
    </div>
    <div class="w-full">
        {{ $slot }}
    </div>
</div>
