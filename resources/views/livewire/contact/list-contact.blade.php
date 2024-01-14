<div>
    <div class="flex flex-col border-r-2 overflow-y-auto" style="height: 50rem">
        <div class="py-4 border-b-2 bg-gray-200 px-2">
            <div class="flex flex-wrap justify-between text-3xl">
                <div class="cursor-pointer" x-on:click="ListContact = false">
                    <i class="fa fa-arrow-left mr-5 ml-4"></i>
                    Contact
                </div>
            </div>
        </div>

        <div class="py-4 px-2">
            <input type="text" placeholder="Cari Contact"
                class="py-2 px-2 border-2 border-gray-200 rounded-2xl w-full" />
        </div>

        @foreach ($contact as $item)
            <div class="flex flex-row py-4 px-2 justify-center items-center border-b-2 cursor-pointer"
                x-on:click="selectedContact = '{{ $item->contact_user_id }}'">
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
