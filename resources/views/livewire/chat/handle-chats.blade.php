<div>
    @if (!is_null($selected_contact))

        @foreach ($user as $key => $item)
            <template x-if="selectedContact == '{{ $item->uuid_list_contact }}'">
                <div class="flex flex-col justify-between" x-bind:class="{ 'bg-black text-white': $store.darkMode.on }">
                    <x-navbar.navbar-profile image="{{ $item->getAvatar() }}" name="{{ $item->getName() }}"
                        actions="openSidebar" />

                    <div class="" x-bind:class="{ 'bg-black text-white border-black': $store.darkMode.on }">
                        <x-sidebar.custom-sidebar actions="openSidebar">
                            @livewire('history-chat.sidebar-history-chat', [
                                'selectedContactId' => $item->uuid_list_contact,
                            ])
                        </x-sidebar.custom-sidebar>
                        @livewire('chat.history-chat', [
                            'selectedContactId' => $item->id,
                        ])
                    </div>
                </div>
            </template>
        @endforeach
    @else
        <x-page.welcome-page />
    @endif
</div>
