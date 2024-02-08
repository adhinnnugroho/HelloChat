<div class="text-lg font-semibold flex flex-row py-4 px-2 cursor-pointer "
    x-bind:class="{ 'border border-gray-600': $store.darkMode.on, 'border border-gray-200': !$store.darkMode.on }"
    {{ $attributes }}>
    {{ $slot }}
</div>
