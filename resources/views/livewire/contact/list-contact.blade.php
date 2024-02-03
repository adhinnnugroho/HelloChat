<div>
    <div class="flex flex-col border-r-2 overflow-y-auto" style="height: 50rem">
        <x-navbar.navbar-back title="Contact" icons="fa-arrow-left" actions="ListContact" />

        <x-input.border-input type="text" placeholder="search Contact" />

        @foreach ($contact as $item)
            <div class="flex flex-row py-4 px-2 justify-center items-center border-b-2 cursor-pointer"
                x-on:click="selectedContact = '{{ $item->uuid }}'"
                wire:click="createNewChatRoom('{{ $item->EncrytionsId($item->id) }}')">
                <div class="w-1/5 ml-4">
                    @if (stripos($item->User->UserDetails->avatar, 'images/') !== false)
                        <img src="{{ asset('/storage/' . $item->User->UserDetails->avatar) }}"
                            class="object-cover h-12 w-12 rounded-full">
                    @else
                        <img src="{{ $item->User->UserDetails->avatar }}" class="object-cover h-12 w-12 rounded-full">
                    @endif
                </div>
                <div class="w-full">
                    <div class="text-lg font-semibold">{{ $item->user->name }}</div>
                    <span class="text-gray-500">{{ $item->user->info_account }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
