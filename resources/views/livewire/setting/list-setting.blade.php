<div>
    <div class="flex flex-row py-4 px-2 justify-center items-center border-b-2 cursor-pointer"
        x-on:click="openSettingProfile = !openSettingProfile">
        <div class="w-1/5 ml-4">
            <img src="{{ $userLogin->avatar }}" class="object-cover h-12 w-12 rounded-full" alt="" />
        </div>
        <div class="w-full">
            <div class="text-lg font-semibold">{{ $userLogin->Users->name }}</div>
            <span class="text-gray-500">{{ $userLogin->info_account }}</span>
        </div>
    </div>
</div>
