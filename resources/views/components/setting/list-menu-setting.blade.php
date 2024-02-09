<div class="text-lg font-semibold flex flex-row py-4 px-2 cursor-pointer "
    x-bind:class="{ '': $store.darkMode.on, 'border border-gray-200': !$store.darkMode.on }" {{ $attributes }}>
    {{ $slot }}
</div>
