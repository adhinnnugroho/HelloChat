<div>
    <div class="flex flex-row py-4 px-2 justify-center items-center border-b-2 cursor-pointer dark:bg-black dark:text-white"
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

    <div class="text-lg font-semibold flex flex-row py-4 px-2 border-b-2 cursor-pointer dark:bg-black dark:text-white">
        <div class="lg:ml-4 " @click="$store.darkMode.toggle()">
            <div x-text="$store.darkMode.on"></div>
            Dark Mode
        </div>
    </div>
</div>
