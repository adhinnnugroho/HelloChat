<div class="">
    <x-contact.contact_view image="{{ $userLogin->avatar }}" name="{{ $userLogin->Users->name }}"
        info="{{ $userLogin->info_account }}" x-on:click="openSettingProfile = !openSettingProfile" />

    <x-setting.list-menu-setting @click="$store.darkMode.toggle()">
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
    </x-setting.list-menu-setting>
</div>
