<input class="w-full focus:border-none focus:outline-none"
    x-bind:class="{
        'bg-black text-white border-black border-b-gray-600': $store.darkMode.on,
        'bg-white border-white text-black border-b-gray-400':
            !$store.darkMode.on
    }"
    {{ $attributes }}>
