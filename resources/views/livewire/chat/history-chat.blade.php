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

                <div x-show="showMicNotFound">
                    <div x-data="{ open: false }" x-init="open = !open;">
                        <x-modal.simple-modal id="feedback-modal" show_id="open" title="Microphone Not Found"
                            subtitle="">
                        </x-modal.simple-modal>
                    </div>
                </div>
            </div> --}}
            <i class="fas fa-microphone text-2xl float-right mt-1 fixed right-7 text-gray-500 cursor-pointer"></i>
        </div>
    </div>

    @push('scripts')
        <script>
            function submitForm() {
                Livewire.dispatch('savedChat')
            }
        </script>
        <script src="{{ asset('/assets/js/textarea-animations.js') }}"></script>

        <script>
            function voiceNote() {
                return {
                    mediaRecorder: null,
                    audioChunks: [],
                    isRecording: false,
                    audioURL: null,
                    showMicNotFound: false,

                    startRecording() {
                        navigator.mediaDevices.getUserMedia({
                                audio: true
                            })
                            .then(stream => {
                                this.mediaRecorder = new MediaRecorder(stream);

                                this.mediaRecorder.ondataavailable = event => {
                                    if (event.data.size > 0) {
                                        this.audioChunks.push(event.data);
                                    }
                                };

                                this.mediaRecorder.onstop = () => {
                                    const blob = new Blob(this.audioChunks, {
                                        type: 'audio/wav'
                                    });
                                    this.audioURL = URL.createObjectURL(blob);
                                };

                                this.mediaRecorder.start();
                                this.isRecording = true;
                            })
                            .catch(error => {
                                console.error('Error accessing microphone:', error);
                                this.showMicNotFound = true;
                            });
                    },

                    stopRecording() {
                        if (this.isRecording) {
                            this.mediaRecorder.stop();
                            this.isRecording = false;
                        }
                    },

                    hideMicNotFound() {
                        this.showMicNotFound = false;
                    },
                };
            }
        </script>
    @endpush
</div>
