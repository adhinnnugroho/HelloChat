<div x-show="{{ $show }}" class="lg:w-2/5 w-screen">
    @if (!is_null($code))
        <div x-show="{{ $code }}">
            <div class="fixed overflow-y-auto overflow-x-hidden lg:w-2/7 w-full"
                x-bind:class="{ 'bg-black text-white': $store.darkMode.on }">
                <div class="flex flex-col  h-screen"
                    x-bind:class="{
                        'lg:border-gray-600 lg:border-r-2': $store.darkMode.on,
                        'lg:border-gray-100 lg:border-r-2 ': !$store.darkMode.on,
                    }">
                    {{ $slot }}
                </div>
            </div>
        </div>
    @else
        <div class="fixed overflow-y-auto overflow-x-hidden lg:w-2/7 w-full"
            x-bind:class="{ 'bg-black text-white': $store.darkMode.on }">
            <div class="flex flex-col lg:border-r-2 h-screen">
                {{ $slot }}
            </div>
        </div>
    @endif

</div>
