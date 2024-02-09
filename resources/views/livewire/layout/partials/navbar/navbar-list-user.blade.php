<div class="py-3 border-b-2  px-2" x-bind:class="{ 'bg-black text-white border-b-gray-500': $store.darkMode.on }">
    <div class="flex flex-wrap justify-between">
        <div>
            <x-image.show-image :image="$userLogin->avatar" class="rounded-full h-11 w-11 ml-3 cursor-pointer"
                x-on:click="openSettingProfile = !openSettingProfile" />
        </div>
        <div class="float-right" x-data="{ isOpen: false }">
            <div class="grid grid-cols-2 gap-3 mt-1 relative" wire:ignore>
                <i class="fa fa-ellipsis-vertical text-3xl cursor-pointer" x-on:click="isOpen = !isOpen"></i>
                <x-menu.drop-down-menu id="show-profile-setting" show_id="isOpen" class="right-0 mt-8">
                    {{-- @livewire('new-contact.add-new-contact') --}}
                    <x-menu.list-menu x-on:click="openSettingSidebar = !openSettingSidebar, isOpen = false">
                        Setelan
                    </x-menu.list-menu>
                    <x-menu.list-menu links="{{ route('logout') }}">
                        Logout
                    </x-menu.list-menu>
                </x-menu.drop-down-menu>
            </div>
        </div>
    </div>
</div>
