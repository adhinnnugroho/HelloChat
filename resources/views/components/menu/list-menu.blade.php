@if (!is_null($links))
    <a href="{{ $links }}" x-bind:class="{ 'hover:text-black ': $store.darkMode.on }" {{ $attributes }}>
        <li class="p-2 hover:bg-gray-300 cursor-pointer">
            {{ $slot }}
        </li>
    </a>
@else
    <li class="p-2 hover:bg-gray-300 cursor-pointer" x-bind:class="{ 'hover:text-black ': $store.darkMode.on }"
        {{ $attributes }}>
        <a href="#">
            {{ $slot }}
        </a>
    </li>
@endif
