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

            <div x-data="voiceNote()">
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
                    <x-icons.show-icons icons="microphone" actions="startRecording" />
                </template>
                <template x-if="isRecording">
                    <div class="">
                        <x-icons.show-icons icons="circle-notch fa-spin" color="red-600" />
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
