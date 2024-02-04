<div x-data="{ modelOpen: false }" wire:ignore>
    <li class="p-2 hover:bg-gray-300 cursor-pointer" x-bind:class="{ 'hover:text-black ': $store.darkMode.on }"
        x-on:click="modelOpen = !modelOpen" wire:click="getUserProfile">
        <a href="#">Lihat Foto</a>
    </li>
    <x-modal.simple-modal id="show-profile-picture" show_id="modelOpen" title="Foto Profil" subtitle="" wire:ignore>
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
            @if (stripos($userLogin->avatar, 'images/') !== false)
                <img src="{{ asset('/storage/' . $userLogin->avatar) }}" alt="User Profile"
                    class="rounded-full w-64 h-64 content-center mx-auto" />
            @else
                <img src="{{ $userLogin->avatar }}" alt="User Profile"
                    class="rounded-full w-64 h-64 content-center mx-auto" />
            @endif
        </div>
    </x-modal.simple-modal>
</div>
