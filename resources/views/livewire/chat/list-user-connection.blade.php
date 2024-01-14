<div x-data="{
    listUserConnects: {{ $user }},
    countUserConnectlist: {{ count($user) }},
    selectedContact: '',
    openSidebar: false,
    openSettingSidebar: false,
    openSettingProfile: false,
    ListContact: false
}" id="my-chat-list">
    <div class="flex flex-row justify-between bg-white">
        <!-- chat list -->
        <div class="lg:w-2/5 w-screen ">
            <div x-show="!ListContact">
                <div x-show="!openSettingProfile">
                    <div class="" x-show="!openSettingSidebar">

                        @livewire('chat.list-chat', [
                            'user' => $user,
                        ])

                    </div>
                </div>
            </div>

            <div x-show="ListContact">
                @livewire('contact.list-contact')
            </div>

            <div x-show="!openSettingProfile">
                <div class="" x-show="openSettingSidebar">
                    @livewire('setting.sidebar')
                </div>
            </div>

            <div x-show="openSettingProfile">
                @livewire('setting.profile.profile-setting')
            </div>
        </div>
        <!-- end chat list -->
        <!-- message -->
        <div class="lg:w-full">
            <div class="overflow-y-auto">
                @livewire('chat.handle-chats')
            </div>
        </div>
        <!-- end message -->
        {{-- <div class="lg:w-2/5 lg:border-l-2 lg:px-5" x-show="openSidebar">
            @foreach ($user as $key => $item)
                <template x-if="selectedContact == '{{ $item->uuid }}'">
                    @livewire('history-chat.sidebar-history-chat', [
                        'selectedContactId' => $item->uuid,
                    ])
                </template>
            @endforeach
        </div> --}}
    </div>
</div>
