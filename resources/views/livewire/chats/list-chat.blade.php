<div>
    <div class="fixed overflow-y-auto lg:w-2/7 w-full"
        x-bind:class="{ 'bg-black text-white border-blac': $store.darkMode.on }">
        <div class="flex flex-col  h-screen"
            x-bind:class="{
                'lg:border-gray-500 lg:border-r-2': $store.darkMode.on,
                'lg:border-gray-300 lg:border-r-2': !$store.darkMode.on
            }">
            <div class="py-3 border-b-2  px-2"
                x-bind:class="{ 'bg-black text-white border-b-gray-500': $store.darkMode.on }">
                <div class="flex flex-wrap justify-between">
                    <div>
                        <x-image.show-image :image="$UserLogin->avatar" class="rounded-full h-11 w-11 ml-3 cursor-pointer"
                            x-on:click="openSettingProfile = !openSettingProfile" />
                    </div>
                    <div class="float-right" x-data="{ isOpen: false }">
                        <div class="grid grid-cols-2 gap-3 mt-1 relative" wire:ignore>
                            <i class="fa fa-ellipsis-vertical text-3xl cursor-pointer" x-on:click="isOpen = !isOpen"></i>
                            <x-menu.drop-down-menu id="show-profile-setting" show_id="isOpen" class="right-0 mt-8">
                                <x-menu.list-menu x-on:click="openSettingSidebar = !openSettingSidebar, isOpen = false">
                                    Setelan
                                </x-menu.list-menu>
                                <x-menu.list-menu links="{{ route('logout') }}">
                                    Logout
                                </x-menu.list-menu>
                            </x-menu.drop-down-menu>
                        </div>
                    </div>
                </div>
            </div>
            <x-input.border-input type="text" placeholder="search chatting" wire:model.live="search_chat" />

            @forelse ($ListUserChat as $item)
                @php
                    $unreadMessagesCount = $item->chats->unreadMessagesCount($item->chats->id);
                    $chatsId = $item->chats->id;
                    $name = $item->getName();
                    $messages = $item->chats->lastMessage->boddy_message;
                    $UserPhotoProfile = $item->getAvatar();
                    $LastMessageId = $item->chats->lastMessage->chat_id;
                    $ChatData = $item->chats;
                    $CreatedChat = $item->chats->lastMessage->created_at;
                @endphp

                <div x-data="{
                    unreadMessagesCount: {{ $unreadMessagesCount }},
                    ChatsId: {{ !empty($chatsId) ? 'true' : 'false' }},
                }">
                    <template x-if="ChatsId">
                        <x-chats.chat-view image="{{ $UserPhotoProfile }}"
                            wire:click.stop="readMessage('{{ $item->EncrytionsChatId($LastMessageId) }}')"
                            x-on:click="selectedContact = '{{ $item->uuid_list_contact }}'">
                            <div class="w-full">
                                <x-chats.details-chat>
                                    {{ $name }}
                                </x-chats.details-chat>
                                <x-chats.details-chat>
                                    {{ implode('..', str_split($messages, 20)) }}
                                </x-chats.details-chat>
                                <x-chats.details-chat class="float-right lg:-mt-11">
                                    {{ date('H:i', strtotime($CreatedChat)) }}
                                </x-chats.details-chat>
                                <template x-if="unreadMessagesCount > 0">
                                    <x-border.rounded-border>
                                        {{ $ChatData->unreadMessagesCount($chatsId) }}
                                    </x-border.rounded-border>
                                </template>
                            </div>
                        </x-chats.chat-view>
                    </template>
                </div>
            @empty
                <span class="text-gray-400 text-center mt-5">Data not found</span>
            @endforelse

            <div class="bg-green-700 text-white rounded-full w-10 h-10  absolute right-5 bottom-5 text-center text-2xl cursor-pointer"
                x-on:click="ListContact = !ListContact">
                +
            </div>
        </div>
    </div>
</div>
