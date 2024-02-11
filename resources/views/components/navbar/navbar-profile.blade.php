<div class="border-b-2 p-3 fixed"
    x-bind:class="{
        'bg-black text-white border border-black border-b-gray-600 border-r-gray-600 ': $store.darkMode.on,
        'border border-white border-b-gray-300': !$store.darkMode.on,
        'w-[42.4rem]': {{ $actions }},
        'w-screen': !{{ $actions }}
    }">
    <div class="flex flex-wrap justify-between ">
        <a href="#" x-on:click="{{ $actions }} = !{{ $actions }}">
            <div class="flex flex-warp">
                <img src="{{ $image }}" alt="" class="rounded-full h-11 w-11 ml-3">
                <h5 class="mt-3 ml-2">
                    {{ $name }}
                </h5>
            </div>
        </a>
    </div>
</div>
