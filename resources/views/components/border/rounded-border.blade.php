@props(['color' => 'green-700'])

<div class="float-right lg:-mt-4 bg-{{ $color }} rounded-full text-white w-6 h-6 text-center lg:mr-2">
    {{ $slot }}
</div>
