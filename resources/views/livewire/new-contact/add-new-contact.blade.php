<div x-data="{ modelOpen: false }">
    <li class="p-2 hover:bg-gray-300 cursor-pointer" x-on:click="modelOpen = !modelOpen"
        x-bind:class="{ 'hover:text-black ': $store.darkMode.on }">
        <a href="#">Tambah Kontak</a>
    </li>
    <x-modal.simple-modal id="show-profile-picture" show_id="modelOpen" title="Tambah Kontak Baru" subtitle=""
        wire:ignore>
        <div class="max-h-[42rem] min-w-[20rem] overflow-x-hidden">
            <x-slot name="icon">
                <button x-on:click="modelOpen = false" class="text-red-600 focus:outline-none hover:text-red-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </x-slot>

            <div class="grid grid-cols-1 ">
                <x-input.search-input label="Search" placeholder="Search user token..." required
                    wire:model.live="search" />
            </div>

            <div class="grid grid-cols-1 mt-5">
                <table class="min-w-full"
                    x-bind:class="{
                        'bg-black text-white border-b-gray-500': $store.darkMode.on
                    }">
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td class="py-2 px-3 border-b border-gray-300"
                                    x-bind:class="{ ' border-black': $store.darkMode.on }">
                                    @if (stripos($item->UserDetails->avatar, 'images/') !== false)
                                        <img src="{{ asset('/storage/' . $item->UserDetails->avatar) }}"
                                            class="rounded-full w-16 h-16 mb-5 content-center">
                                    @else
                                        <img src="{{ $item->UserDetails->avatar }}"
                                            class="rounded-full w-16 h-16 mb-5 content-center">
                                    @endif
                                </td>
                                <td class="py-2 px-3 border-b border-gray-300"
                                    x-bind:class="{
                                        ' border-black': $store.darkMode.on
                                    }">
                                    {{ $item->name }}({{ $item->username }})</td>
                                <td class="py-2 px-3 border-b border-gray-300"
                                    x-bind:class="{
                                        ' border-black': $store.darkMode.on
                                    }">
                                    <x-button.rounded-button wire:loading.attr="disabled" color="gold"
                                        wire:offline.attr="disabled" wire:click="validationFrom({{ $item->id }})">
                                        <div wire:loading.remove wire:target="validationFrom({{ $item->id }})">
                                            {{ __('Tambah') }}
                                        </div>
                                        <div wire:loading wire:target="validationFrom({{ $item->id }})">
                                            <i class="fa fa-circle-notch fa-spin mr-2"></i>
                                            {{ __('Prosessing..') }}
                                        </div>
                                    </x-button.rounded-button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-modal.simple-modal>
</div>
