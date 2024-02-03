<div>
    <div class="flex flex-col border-r-2 overflow-y-auto" style="height: 50rem">
        <div class="py-4 border-b-2 px-2" x-bind:class="{ 'bg-black text-white border-b-gray-600': $store.darkMode.on }">
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


        <div class="ml-5 mt-5 mr-5">
            <div class="name-profile">
                <h5 class="text-xl font-bold mb-4">
                    Nama Anda
                </h5>


                <div class="border border-white border-b-gray-500 pb-1"
                    x-bind:class="{ 'bg-black text-white border-black': $store.darkMode.on }">
                    {{ $userLogin->Users->name }}
                    <i class="fas fa-edit float-right lg:mr-2 lg:mt-1 cursor-pointer"></i>
                </div>
                <p class="mt-4">
                    Ini bukan nama pengguna atau PIN Anda. Nama ini akan ditampilkan ke kontak hellochat Anda.
                </p>
            </div>

            <div class="info-profile mt-10">
                <h5 class="text-xl font-bold mb-4">
                    Info Akun
                </h5>


                <div class="border border-white border-b-gray-500 pb-1"
                    x-bind:class="{ 'bg-black text-white border-black': $store.darkMode.on }">
                    {{ $userLogin->info_account ?? '...' }}
                    <i class="fas fa-edit float-right lg:mr-2 lg:mt-1 cursor-pointer"></i>
                </div>
            </div>
        </div>
    </div>

</div>
