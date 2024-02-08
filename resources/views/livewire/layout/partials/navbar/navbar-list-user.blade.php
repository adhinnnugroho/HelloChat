<div class="py-3 border-b-2  px-2" x-bind:class="{ 'bg-black text-white border-b-gray-500': $store.darkMode.on }">
    <div class="flex flex-wrap justify-between">
        <div>
            @if (stripos($userLogin->avatar, 'images/') !== false)
                <img src="{{ asset('/storage/' . $userLogin->avatar) }}" alt=""
                    class="rounded-full h-11 w-11 ml-3 cursor-pointer"
                    x-on:click="openSettingProfile = !openSettingProfile">
            @else
                <img src="{{ $userLogin->avatar }}" alt="" class="rounded-full h-11 w-11 ml-3 cursor-pointer"
                    x-on:click="openSettingProfile = !openSettingProfile">
            @endif
        </div>
        <div class="float-right" x-data="{ isOpen: false }">
            <div class="grid grid-cols-2 gap-3 mt-1 relative" wire:ignore>
                <i class="fa fa-ellipsis-vertical text-3xl cursor-pointer" x-on:click="isOpen = !isOpen"></i>
                <x-menu.drop-down-menu id="show-profile-setting" show_id="isOpen" class="right-0 mt-8">
                    @livewire('new-contact.add-new-contact')
                    <li class="p-2 hover:bg-gray-300 cursor-pointer"
                        x-bind:class="{ 'hover:text-black ': $store.darkMode.on }"
                        x-on:click="openSettingSidebar = !openSettingSidebar, isOpen = false">
                        <a href="#">Setelan</a>
                    </li>
                    <a href="{{ route('logout') }}" x-bind:class="{ 'hover:text-black ': $store.darkMode.on }">
                        <li class="p-2 hover:bg-gray-300 cursor-pointer">
                            Logout
                        </li>
                    </a>
                </x-menu.drop-down-menu>
            </div>
        </div>
    </div>
</div>
