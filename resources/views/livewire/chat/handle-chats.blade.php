<div>
    @if (!is_null($selected_contact))
        @forelse ($user as $key => $item)
            <template x-if="selectedContact == '{{ $item->uuid_list_contact }}'">
                <div class="flex flex-col justify-between" x-bind:class="{ 'bg-black text-white': $store.darkMode.on }">
                    <div class="border-b-2 p-3 fixed w-screen"
                        x-bind:class="{ 'bg-black text-white border-black': $store.darkMode.on }">
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


                    <div class="" x-bind:class="{ 'bg-black text-white border-black': $store.darkMode.on }">
                        @livewire('chat.history-chat', [
                            'selectedContactId' => $item->id,
                        ])
                    </div>
                </div>
            </template>
        @empty
            <div class="">
                <h5 class="text-center text-2xl items-center h-screen">
                    Hallo Chat
                </h5>
            </div>
        @endforelse
    @else
        <div class="">
            <h5 class="text-center text-2xl items-center h-screen">
                Hallo Chat
            </h5>
        </div>
    @endif
</div>
