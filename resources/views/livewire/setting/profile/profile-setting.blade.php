<div>
    <div class="flex flex-col border-r-2 overflow-y-auto" style="height: 50rem">
        <x-navbar.navbar-back title="Profile" icons="fa-arrow-left" actions="openSettingProfile" />
        <div class="relative mt-5" x-data="{ isOpen: false }">
            <div class="relative w-44 h-44 mx-auto rounded-full overflow-hidden cursor-pointer group"
                x-on:click="isOpen = !isOpen">
                @if (stripos($userLogin->avatar, 'images/') !== false)
                    <img src="{{ asset('/storage/' . $userLogin->avatar) }}" alt="User Profile"
                        class="group-hover:opacity-50 object-cover w-full h-full" />
                @else
                    <img src="{{ $userLogin->avatar }}" alt="User Profile"
                        class="group-hover:opacity-50 object-cover w-full h-full" />
                @endif
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
            <x-menu.drop-down-menu id="show-profile-setting" show_id="isOpen" class="right-6 -mt-24">
                @livewire('setting.profile.partials.show-profile-image')
                @livewire(
                    'setting.profile.partials.upload-new-profile-image',
                    [
                        'userLogin' => $userLogin,
                    ],
                    key($userLogin->id)
                )
                @livewire('setting.profile.partials.remove-profile-image')
            </x-menu.drop-down-menu>
        </div>


        <div class="ml-5 mt-5 mr-5">
            <div class="name-profile">
                <h5 class="text-xl font-bold mb-4">
                    Nama Anda
                </h5>
                <div x-data="{ isEditing: false }">
                    <x-profile.border-profile-input>
                        <span x-show="!isEditing">{{ $userLogin->Users->name }}</span>
                        <x-input.profile-input x-show="isEditing" @keydown.enter="isEditing = false"
                            value="{{ $userLogin->Users->name }}" autofocus />
                        <i class="fas fa-edit float-right lg:mr-2 lg:mt-1 cursor-pointer"
                            x-on:click="isEditing = !isEditing"></i>
                    </x-profile.border-profile-input>
                </div>

                <p class="mt-4">
                    Ini bukan nama pengguna atau PIN Anda. Nama ini akan ditampilkan ke kontak hellochat Anda.
                </p>
            </div>

            <div class="info-profile mt-10">
                <h5 class="text-xl font-bold mb-4">
                    Info Akun
                </h5>

                <x-profile.border-profile-input>
                    {{ $userLogin->info_account ?? '...' }}
                    <i class="fas fa-edit float-right lg:mr-2 lg:mt-1 cursor-pointer"></i>
                </x-profile.border-profile-input>

                <p class="mt-4">
                    Info akun ini akan ditampilkan ke kontak hellochat Anda.
                </p>
            </div>
        </div>
    </div>
</div>
