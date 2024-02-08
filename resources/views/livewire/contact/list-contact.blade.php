<div>
    <div class="flex flex-col border-r-2 overflow-y-auto" style="height: 50rem">
        <x-navbar.navbar-back title="Contact" icons="fa-arrow-left" actions="ListContact" />

        <x-input.border-input type="text" placeholder="search Contact" />


        @forelse ($contact as $item)
            <x-contact.contact_view image="{{ $item->User->UserDetails->avatar }}" name="{{ $item->user->name }}"
                info="{{ $item->user->info_account }}" x-on:click="selectedContact = '{{ $item->uuid }}'"
                wire:click="createNewChatRoom('{{ $item->EncrytionsId($item->id) }}')" />
        @empty
            <h5 class="text-center text-lg text-gray-500">
                Contact not found
            </h5>
        @endforelse
    </div>
</div>
