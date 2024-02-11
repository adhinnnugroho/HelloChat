@props(['position' => 'right'])


@if (!is_null($actions))
    <i @click="{{ $actions }}"
        class="fas fa-{{ $icons }} text-2xl float-{{ $position }} mt-1 fixed {{ $position }}-7 text-gray-500 cursor-pointer"
        {{ $attributes }}></i>
@else
    <i class="fas fa-{{ $icons }} text-2xl float-{{ $position }} mt-1
        fixed {{ $position }}-7 text-gray-500 cursor-pointer"
        {{ $attributes }}></i>
@endif
