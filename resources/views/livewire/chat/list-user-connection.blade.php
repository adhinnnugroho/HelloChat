<x-chats.chats-layouts>
    <!-- chat list -->
    <div class="lg:w-2/5 w-screen">
        <div x-show="!AddContact">
            <div x-show="!ListContact">
                <div x-show="!openSettingProfile">
                    <div class="" x-show="!openSettingSidebar">
                        @livewire('chat.list-chat', [
                            'user' => $user,
                        ])
                    </div>
                </div>
            </div>
        </div>

        <x-sidebar.sidebar show="ListContact">
            @livewire('contact.list-contact')
        </x-sidebar.sidebar>

        <x-sidebar.sidebar show="AddContact">
            @livewire('contact.add-contact')
        </x-sidebar.sidebar>

        <x-sidebar.sidebar show="!openSettingProfile" code="openSettingSidebar">
            @livewire('setting.sidebar')
        </x-sidebar.sidebar>

        <x-sidebar.sidebar show="openSettingProfile">
            @livewire('setting.profile.profile-setting')
        </x-sidebar.sidebar>

    </div>
    <!-- end chat list -->

    <!-- message -->
    <div class="lg:w-full w-screen" x-bind:class="{ 'bg-black text-white border-black': $store.darkMode.on }">
        <div class="overflow-y-auto">
            @livewire('chat.handle-chats')
        </div>
    </div>
    <!-- end message -->

    @push('scripts')
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

                            const blob = new Blob(this.audioChunks, {
                                type: 'audio/wav'
                            });
                            Livewire.dispatch('savedAudio', {
                                audio: URL.createObjectURL(blob)
                            });
                            this.isRecording = false;
                        }
                    },

                    hideMicNotFound() {
                        this.showMicNotFound = false;
                    },
                };
            }
        </script>
        <script src="{{ asset('/assets/js/textarea-animations.js') }}"></script>
        <script>
            function submitForm() {
                Livewire.dispatch('savedChat')
            }
        </script>
    @endpush
</x-chats.chats-layouts>
