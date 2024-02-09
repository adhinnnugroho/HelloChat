<div class="py-4 px-2">
    @if (!is_null($label))
        <label for="" class="text-base block mb-2 ml-2">{{ $label }}</label>
    @endif
    <input class="py-2 px-2 border-2 border-gray-200 rounded-2xl w-full"
        x-bind:class="{ 'bg-black text-white border-gray-600': $store.darkMode.on }" {{ $attributes }} />
</div>
