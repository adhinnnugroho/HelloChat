<label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">
    {{ $label }}
</label>
<div class="relative">
    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
        </svg>
    </div>
    <input type="search" id="default-search"
        x-bind:class="{
            'bg-black text-white border-gray-500 focus:ring-gray-500 focus:border-gray-500 ': $store.darkMode.on
        }"
        {{ $attributes->merge([
            'class' =>
                'block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500',
            'id' => 'default-search',
        ]) }}>
</div>
