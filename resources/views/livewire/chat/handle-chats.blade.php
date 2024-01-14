<div>
    @foreach ($user as $key => $item)
        <template x-if="selectedContact == '{{ $item->uuid_list_contact }}'">
            <div class="flex flex-col justify-between">
                <div class="border-b-2 bg-gray-200 p-3 fixed w-screen">
                    <div class="flex flex-wrap justify-between ">
                        <a href="#" x-on:click="openSidebar = !openSidebar">
                            <div class="flex flex-warp">
                                <img src="{{ $item->getAvatar() }}" alt="" class="rounded-full h-11 w-11 ml-3">
                                <h5 class="mt-3 ml-2">
                                    {{ $item->getName() }}
                                </h5>
                            </div>
                        </a>
                    </div>
                </div>


                <div class="">
                    @livewire('chat.history-chat', [
                        'selectedContactId' => $item->id,
                    ])
                </div>
            </div>
        </template>
    @endforeach
</div>
