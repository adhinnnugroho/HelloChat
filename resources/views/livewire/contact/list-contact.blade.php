<div>
    <div class="flex flex-col  overflow-y-auto">
        <x-navbar.navbar-back title="Contact" icons="fa-arrow-left" actions="ListContact" />

        <x-setting.list-menu-setting x-on:click="AddContact = !AddContact">
            <i class="fas fa-plus text-lg lg:mr-2 lg:ml-2"></i>
            Tambah Kontak
        </x-setting.list-menu-setting>


        <h5 class="ml-4 mt-5">
            List Contact in Hello Chat
        </h5>
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
