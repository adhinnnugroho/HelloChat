<x-chats.chats-layouts>
    <!-- chat list -->
    <div class="lg:w-2/5 w-screen">
        <div x-show="!ListContact">
            <div x-show="!openSettingProfile">
                <div class="" x-show="!openSettingSidebar">
                    @livewire('chat.list-chat', [
                        'user' => $user,
                    ])
                </div>
            </div>
        </div>

        <x-sidebar.sidebar show="ListContact">
            @livewire('contact.list-contact')
        </x-sidebar.sidebar>

        <x-sidebar.sidebar show="!openSettingProfile" code="openSettingSidebar">
            @livewire('setting.sidebar')
        </x-sidebar.sidebar>

        <x-sidebar.sidebar show="openSettingProfile">
            @livewire('setting.profile.profile-setting')
        </x-sidebar.sidebar>

    </div>
    <!-- end chat list -->

    <!-- message -->
    <div class="lg:w-full w-screen" x-bind:class="{ 'bg-black text-white border-black': $store.darkMode.on }">
        <div class="overflow-y-auto">
            @livewire('chat.handle-chats')
        </div>
    </div>
    <!-- end message -->


    <div class="lg:w-2/5 lg:border-l-2 lg:px-5" x-show="openSidebar">
        @foreach ($user as $key => $item)
            <template x-if="selectedContact == '{{ $item->uuid_list_contact }}'">
                @livewire('history-chat.sidebar-history-chat', [
                    'selectedContactId' => $item->uuid_list_contact,
                ])
            </template>
        @endforeach
    </div>
</x-chats.chats-layouts>
