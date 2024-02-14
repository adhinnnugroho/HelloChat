@props(['color' => 'green-800', 'positions' => 'end'])
<div class="flex justify-{{ $positions }} mb-4 overflow-hidden">
    <div class="bg-{{ $color }} p-4 rounded-lg shadow-md max-w-2xl">
        {{ $slot }}
    </div>
</div>
