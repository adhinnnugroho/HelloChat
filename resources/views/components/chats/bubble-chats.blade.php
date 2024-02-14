@props(['color' => '', 'positions' => 'end'])
<div class="flex justify-{{ $positions }} mb-4 overflow-hidden">
    <div class="{{ $color }} p-4 rounded-lg shadow-md max-w-2xl">
        {{ $slot }}
    </div>
</div>
