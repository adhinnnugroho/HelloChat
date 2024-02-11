@props(['positions' => 'float-right'])

<div class="lg:w-2/5  lg:px-5 {{ $positions }} h-screen" x-show="{{ $actions }}"
    x-bind:class="{
        'bg-black text-white border border-gray-600 lg:border-l-2': $store
            .darkMode.on,
        'border border-white lg:border-l-2': !$store.darkMode.on,
    }">
    {{ $slot }}
</div>
