<div>
    <div class="fixed overflow-y-auto lg:w-2/7 w-full"
        x-bind:class="{ 'bg-black text-white border-blac': $store.darkMode.on }">
        <div class="flex flex-col  h-screen"
            x-bind:class="{
                'lg:border-gray-500 lg:border-r-2': $store.darkMode.on,
                'lg:border-gray-300 lg:border-r-2': !$store.darkMode.on
            }">
            @livewire('layout.partials.navbar.navbar-list-user')
            <x-input.border-input type="text" placeholder="search chatting" wire:model.live="search_chat" />
            @if (count($user) > 0)
                @foreach ($user as $item)
                    <div x-data="{ unreadMessagesCount: {{ $item->chats->unreadMessagesCount($item->chats->id) }} }">
                        @if (!empty($item->chats->id))
                            <x-chats.chat-view image="{{ $item->getAvatar() }}"
                                wire:click.stop="readMessage('{{ $item->EncrytionsChatId($item->chats->lastMessage->chat_id) }}')"
                                x-on:click="selectedContact = '{{ $item->uuid_list_contact }}'">
                                <div class="w-full">
                                    <x-chats.details-chat>
                                        {{ $item->getName() }}
                                    </x-chats.details-chat>
                                    <x-chats.details-chat>
                                        {{ implode('..', str_split($item->chats->lastMessage->boddy_message, 20)) }}
                                    </x-chats.details-chat>
                                    <x-chats.details-chat class="float-right lg:-mt-11">
                                        {{ date('H:i', strtotime($item->chats->lastMessage->created_at)) }}
                                    </x-chats.details-chat>
                                    <template x-if="unreadMessagesCount > 0">
                                        <x-border.rounded-border>
                                            {{ $item->chats->unreadMessagesCount($item->chats->id) }}
                                        </x-border.rounded-border>
                                    </template>
                                </div>
                            </x-chats.chat-view>
                        @endif
                    </div>
                @endforeach
            @else
                <span class="text-gray-400 text-center mt-5">Data not found</span>
            @endif


            <div class="bg-green-700 text-white rounded-full w-10 h-10  absolute right-5 bottom-5 text-center text-2xl cursor-pointer"
                x-on:click="ListContact = !ListContact">
                +
            </div>
        </div>
    </div>
</div>
