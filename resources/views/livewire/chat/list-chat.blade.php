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
                    @if (!empty($item->chats->id))
                        <div class="flex flex-row py-4 px-2 justify-center items-center border-b-2 cursor-pointer"
                            wire:click.stop="readMessage('{{ $item->EncrytionsChatId($item->chats->lastMessage->chat_id) }}')"
                            x-on:click="selectedContact = '{{ $item->uuid_list_contact }}'">
                            <div class="w-1/4">
                                <img src="{{ $item->getAvatar() }}" class="object-cover h-12 w-12 ml-5 rounded-full"
                                    alt="" />
                            </div>
                            <div class="w-full">
                                <div
                                    class="{{ $item->chats->unreadMessagesCount($item->chats->id) > 0 ? 'text-black font-bold' : 'font-semibold' }} text-lg ">
                                    {{ $item->getName() }}
                                </div>
                                <span
                                    class="{{ $item->chats->unreadMessagesCount($item->chats->id) > 0 ? 'text-black font-bold' : 'text-gray-500' }}">
                                    {{ implode('..', str_split($item->chats->lastMessage->boddy_message, 20)) }}
                                </span>
                                <div
                                    class="{{ $item->chats->unreadMessagesCount($item->chats->id) > 0 ? 'text-black font-bold' : 'text-gray-500' }} float-right lg:-mt-5">
                                    {{ date('H:i', strtotime($item->chats->lastMessage->created_at)) }}
                                </div>
                                @if ($item->chats->unreadMessagesCount($item->chats->id) > 0)
                                    <div
                                        class="float-right mt-1 bg-green-700 rounded-full text-white w-6 h-6 text-center lg:-mr-7">
                                        {{ $item->chats->unreadMessagesCount($item->chats->id) }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
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
