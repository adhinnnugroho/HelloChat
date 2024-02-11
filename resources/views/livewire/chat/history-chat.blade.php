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
        <div class="flex flex-wrap gap-6" x-data="{ inputValue: '{{ $chatvalue }}' }">
            <i class="fas fa-plus text-2xl text-gray-500 mt-1"></i>

            <x-text-area.simple-text-area type="text" placeholder="Ketik pesan Anda..." id="send_message" x-ref="input"
                x-model="inputValue" wire:model.lazy="chatvalue" @keydown.enter="submitForm"
                x-on:keyup="adjustInputHeight" style="height: 50px;" />

            {{-- <div class="" x-data="voiceNote()">
                <button @click="startRecording" :disabled="isRecording"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Start Recording
                </button>
                <button @click="stopRecording" :disabled="!isRecording"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Stop Recording
                </button>
                <audio controls :src="audioURL" class="mt-4" x-show="audioURL"></audio>
            </div> --}}


            <div x-data="voiceNote()">
                <template x-if="!isRecording">
                    <x-icons.show-icons icons="microphone" actions="startRecording" />
                </template>
                <template x-if="isRecording">
                    <div x-data="{ seconds: 0, timer: null }" x-init="timer = setInterval(() => { seconds++; }, 1000)">
                        <x-icons.show-icons icons="circle-notch fa-spin" class="text-red-600 " />
                        {{-- <i
                            class="fas fa-circle-notch fa-spin text-2xl float-right mt-1 fixed right-7 text-red-500 cursor-pointer"></i> --}}
                        <span x-text="seconds + ' detik'"
                            class="text-gray-500 text-sm absolute top-0 right-14 mt-3"></span>
                        <x-icons.show-icons icons="stop-circle" actions="stopRecording" />
                    </div>
                </template>
                <div x-show="showMicNotFound">
                    <div x-data="{ open: false }" x-init="open = !open;">
                        <x-modal.simple-modal id="feedback-modal" show_id="open" title="Microphone Not Found"
                            subtitle="">
                        </x-modal.simple-modal>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
