<textarea rows="1" {{ $attributes->merge(['class' => 'rounded-lg w-[63rem] px-4 py-2 focus:border-gray-300']) }}
    x-bind:class="{
        'bg-gray-600 text-white border-black': $store.darkMode.on,
        'bg-gray-300 border-white text-black': !$store.darkMode.on
    }">
    {{ $slot }}
</textarea>
