@props(['position' => 'right', 'color' => 'gray-500'])


@if (!is_null($actions))
    <i @click="{{ $actions }}"
        class="fas fa-{{ $icons }} text-2xl float-{{ $position }} mt-1 fixed {{ $position }}-7 text-{{ $color }} cursor-pointer lg:ml-4 lg:mt-2"
        {{ $attributes }}></i>
@else
    <i class="fas fa-{{ $icons }} text-2xl float-{{ $position }} mt-1
        fixed {{ $position }}-7 text-{{ $color }} cursor-pointer"
        {{ $attributes }}></i>
@endif
