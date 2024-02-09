<div x-data="{
    openSidebar: false,
    selectedContact: '',
    openSettingSidebar: false,
    openSettingProfile: false,
    ListContact: false,
    AddContact: false
}" id="my-chat-list">
    <div class="flex flex-row justify-between" x-bind:class="{ 'bg-black text-white': $store.darkMode.on }">
        {{ $slot }}
    </div>
</div>
