<div>
    @if (is_null($history_chat))
        <div class="flex px-5 flex-col mt-24 flex-grow overflow-y-auto h-screen">
            <div class="flex-grow overflow-y-auto">
            </div>
        </div>
    @else
        @livewire('chats.handle-value-chat', [
            'chat' => $history_chat->id,
            'selectedContactId' => $selectedContactId,
        ])
    @endif


    <div class="w-full p-4 bottom-0 fixed"
        x-bind:class="{
            'bg-black text-white border border-black border-t-gray-600': $store.darkMode.on,
            'border border-white border-t-gray-300': !$store.darkMode.on
        }">
        <div class="flex flex-wrap" x-data="{ inputValue: '{{ $chatvalue }}', open: false, another_fitur: false }">
            <div class="w-10">
                <i class="fas fa-plus text-3xl text-gray-500 mt-2 cursor-pointer transition transform duration-300"
                    x-bind:class="{
                        'rotate-0': !another_fitur,
                        'rotate-45': another_fitur
                    }"
                    x-on:click="another_fitur = !another_fitur"></i>
                <div class="bg-white absolute bottom-16 shadow w-44 border rounded-lg text-black overflow-hidden"
                    x-show="another_fitur" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="transform opacity-0 scale-0"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-0">
                    Fitur Lain
                </div>
            </div>
            <div class="" x-data="voiceNote()">
                <x-text-area.simple-text-area type="text" placeholder="Ketik pesan Anda..." id="send_message"
                    x-ref="input" x-model="inputValue" wire:model.lazy="chatvalue" @keydown.enter="submitForm"
                    x-on:keyup="adjustInputHeight" style="height: 50px;" x-show="!isRecording" />
                <div x-data="{ hours: 0, minutes: 0, seconds: 0, timer: null }" x-init="timer = setInterval(() => {
                    seconds++;
                    if (seconds === 60) {
                        seconds = 0;
                        minutes++;
                    }
                    if (minutes === 60) {
                        minutes = 0;
                        hours++;
                    }
                }, 1000)" x-show="isRecording">
                    <template x-if="hours > 0">
                        <span x-text="`${hours.toString().padStart(2, '0')}:`"
                            class="text-white text-sm absolute top-0 left-14 mt-3"></span>
                    </template>
                    <span x-text="`${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`"
                        class="text-white text-sm absolute top-0 left-[60px] mt-3"></span>
                </div>


                <template x-if="!isRecording">
                    <x-icons.show-icons icons="microphone" actions="startRecording" x-on:click="open = !open" />
                </template>
                <template x-if="isRecording">
                    <div class="">
                        <x-icons.show-icons icons="circle-notch fa-spin" color="red-600" />
                        <x-icons.show-icons icons="stop-circle" actions="stopRecording" />
                    </div>
                </template>

                <div x-show="showMicNotFound">
                    <x-modal.simple-modal id="feedback-modal" show_id="open" title="Microphone Not Found"
                        subtitle="">
                        <x-slot name="icon">
                            <button x-on:click="open = false"
                                class="text-red-600 focus:outline-none hover:text-red-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                        </x-slot>
                    </x-modal.simple-modal>
                </div>
            </div>
        </div>
    </div>
</div>
