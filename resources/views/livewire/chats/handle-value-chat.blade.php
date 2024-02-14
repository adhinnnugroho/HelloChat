<div>
    <div class="flex px-5 flex-col mt-24 flex-grow overflow-y-auto h-screen">
        <div class="flex-grow overflow-y-auto">
            @foreach ($chat as $index => $item)
                @foreach ($item->Messages as $message)
                    <div x-data="{
                        typeMessage: '{{ $message->type_messages }}',
                        isSender: {{ $item->sender_id == $user_login->id ? 'true' : 'false' }},
                    }">
                        <template x-if="typeMessage == 'text'">
                            <x-chats.bubble-chats sender_id="{{ $item->sender_id }}"
                                created_chat="{{ $message->created_at }}" read_at_chat="{{ $message->read_at }}"
                                messages="{{ $message->boddy_message }}" />
                        </template>
                        <template x-if="typeMessage == 'voice'">
                            <x-chats.bubble-chats sender_id="{{ $item->sender_id }}"
                                created_chat="{{ $message->created_at }}" read_at_chat="{{ $message->read_at }}"
                                messages="{{ $message->boddy_message }}" />
                        </template>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>
