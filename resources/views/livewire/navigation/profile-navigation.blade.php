<div>
    <div class="py-3 border border-b-1 dark:border-b-gray-600 dark:border-gray-800 border-white">
        <div class="flex flex-wrap justify-between">
            <div>
                <x-image.show-image :image="$current_user->UserDetails->avatar" class="rounded-full h-11 w-11 ml-3 cursor-pointer" />
            </div>
            <div class="float-right" x-data="{ OpenMenuProfileNavigation: false }">
                <div class="grid grid-cols-2 gap-3 mt-1 relative" wire:ignore>
                    <i class="fa fa-ellipsis-vertical text-3xl cursor-pointer dark:text-white text-black"
                        x-on:click="OpenMenuProfileNavigation = !OpenMenuProfileNavigation"></i>
                    <x-menu.drop-down-menu id="show-profile-setting" show_id="OpenMenuProfileNavigation"
                        class="right-2 mt-10 dark:bg-gray-700 dark:border-gray-700 dark:text-white">
                        <x-menu.list-menu
                            x-on:click="welcomeScreen = !welcomeScreen, OpenMenuProfileNavigation = false, SystemSetting = !SystemSetting">
                            Setelan
                        </x-menu.list-menu>
                        <x-menu.list-menu>
                            Logout
                        </x-menu.list-menu>
                    </x-menu.drop-down-menu>
                </div>
            </div>
        </div>
    </div>
</div>