<div class="">
    <div class="flex flex-row py-4 px-2 justify-center items-center cursor-pointer"
        x-on:click="openSettingProfile = !openSettingProfile">
        <div class="w-1/5 ml-4">
            @if (stripos($userLogin->avatar, 'images/') !== false)
                <img src="{{ asset('/storage/' . $userLogin->avatar) }}" alt=""
                    class="rounded-full h-12 w-12 ml-3 cursor-pointer"
                    x-on:click="openSettingSidebar = !openSettingSidebar">
            @else
                <img src="{{ $userLogin->avatar }}" alt="" class="rounded-full h-12 w-12 ml-3 cursor-pointer"
                    x-on:click="openSettingSidebar = !openSettingSidebar">
            @endif
        </div>
        <div class="w-full">
            <div class="text-lg font-semibold">{{ $userLogin->Users->name }}</div>
            <span class="text-gray-500">{{ $userLogin->info_account }}</span>
        </div>
    </div>

    <div class="text-lg font-semibold flex flex-row py-4 px-2 cursor-pointer border border-gray-600"
        @click="$store.darkMode.toggle()">

        <template x-if="$store.darkMode.on">
            <div class="lg:ml-4">
                <i class="fas fa-sun text-lg lg:mr-2"></i>
                Light Mode
            </div>
        </template>
        <template x-if="!$store.darkMode.on">
            <div class="lg:ml-4">
                <i class="fas fa-moon text-lg lg:mr-2"></i>
                Dark Mode
            </div>
        </template>

    </div>
</div>
