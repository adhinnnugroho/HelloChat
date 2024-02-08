<div class="flex flex-row py-4 px-2 justify-center items-center border-b-2 cursor-pointer" {{ $attributes }}>
    <div class="w-1/5 ml-4">
        @if (stripos($image, 'images/') !== false)
            <img src="{{ asset('/storage/' . $image) }}" class="object-cover h-12 w-12 rounded-full">
        @else
            <img src="{{ $image }}" class="object-cover h-12 w-12 rounded-full">
        @endif
    </div>
    <div class="w-full">
        <div class="text-lg font-semibold">{{ $name }}</div>
        <span class="text-gray-500">{{ $info }}</span>
    </div>
</div>
