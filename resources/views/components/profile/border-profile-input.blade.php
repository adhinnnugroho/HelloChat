<div class="border border-b-gray-500 pb-1"
    x-bind:class="{
        'bg-black text-white border-black border-b-gray-600': $store.darkMode.on,
        'bg-white border-white text-black border-b-gray-400':
            !$store.darkMode.on
    }">
    {{ $slot }}
</div>
