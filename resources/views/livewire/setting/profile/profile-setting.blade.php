<div>
    <div class="flex flex-col border-r-2 overflow-y-auto" style="height: 50rem">
        <div class="py-4 border-b-2 bg-gray-200 px-2">
            <div class="flex flex-wrap justify-between text-3xl">
                <div>
                    <i class="fa fa-arrow-left mr-5 ml-4 cursor-pointer" x-on:click="openSettingProfile = false"></i>
                    Profile
                </div>
            </div>
        </div>
        <div class="relative mt-5" x-data="{ isOpen: false }">
            <div class="relative w-44 h-44 mx-auto rounded-full overflow-hidden cursor-pointer group"
                x-on:click="isOpen = !isOpen">
                <img src="{{ $userLogin->avatar }}" alt="User Profile"
                    class="group-hover:opacity-50 object-cover w-full h-full" />
                <div class="absolute inset-0 flex items-center justify-center"
                    x-bind:class="{
                        'bg-black bg-opacity-50 opacity-100 transition-opacity': isOpen,
                        'opacity-0 group-hover:opacity-100 bg-black bg-opacity-50 transition-opacity':
                            !isOpen
                    }">
                    <div class="block text-white content-center text-center">
                        <i class="fa fa-camera text-xl"></i>
                        <p class="text-white text-xl font-bold">Ganti Foto</p>
                    </div>
                </div>
            </div>
            <ul x-show="isOpen"
                class="absolute right-6 -mt-24 shadow w-44 bg-white border
                rounded-lg text-black overflow-hidden">
                @livewire('setting.profile.partials.show-profile-image')
                @livewire(
                    'setting.profile.partials.upload-new-profile-image',
                    [
                        'userLogin' => $userLogin,
                    ],
                    key($userLogin->id)
                )
                @livewire('setting.profile.partials.remove-profile-image')
            </ul>
        </div>

    </div>
</div>
