<div>
    <div class="flex px-5 flex-col mt-24 flex-grow overflow-y-auto h-screen">
        <div class="flex-grow overflow-y-auto">
            {{-- @foreach ($chat as $index => $item)
                @foreach ($item->Messages as $message)
                    <div x-data="{
                        typeMessage: '{{ $message->type_messages }}',
                    }">
                        <template x-if="typeMessage == 'text'">
                            @if ($item->sender_id == $user_login->id)
                                <x-chats.bubble-chats color="bg-green-800">
                                    <p class="text-white mr-14 -mb-5 text-right">
                                        {!! implode("\n", str_split($message->boddy_message, 70)) !!}
                                    </p>
                                    <div class="flex items-center float-right">
                                        <p class="text-xs text-white">
                                            {{ date('H:i', strtotime($message->created_at)) }}
                                        </p>
                                        @if (!is_null($message->read_at))
                                            <div class="fa fa-check text-xs text-green-500 ml-1"></div>
                                        @else
                                            <div class="fa fa-check text-xs text-white ml-1"></div>
                                        @endif
                                    </div>
                                </x-chats.bubble-chats>
                            @else
                                <x-chats.bubble-chats color="bg-white" positions="star">
                                    <p class="text-gray-800 mr-14 -mb-5">
                                        {!! implode("\n", str_split($message->boddy_message, 50)) !!}
                                    </p>
                                    <div class="flex items-center  float-right">
                                        <p class="text-xs text-gray-500">
                                            {{ date('H:i', strtotime($message->created_at)) }}
                                        </p>
                                        @if (!is_null($message->read_at))
                                            <div class="fa fa-check text-xs text-green-500 ml-1"></div>
                                        @else
                                            <div class="fa fa-check text-xs text-gray-500 ml-1"></div>
                                        @endif
                                    </div>
                                </x-chats.bubble-chats>
                            @endif
                        </template>

                        <template x-if="typeMessage == 'voice'">
                            @if ($item->sender_id == $user_login->id)
                                <x-chats.bubble-chats color="bg-green-800">
                                    <p class="text-white mr-14 -mb-5 text-right">
                                        {!! implode("\n", str_split($message->boddy_message, 70)) !!}
                                    </p>
                                    <div class="flex items-center float-right">
                                        <p class="text-xs text-white">
                                            {{ date('H:i', strtotime($message->created_at)) }}
                                        </p>
                                        @if (!is_null($message->read_at))
                                            <div class="fa fa-check text-xs text-green-500 ml-1"></div>
                                        @else
                                            <div class="fa fa-check text-xs text-white ml-1"></div>
                                        @endif
                                    </div>
                                </x-chats.bubble-chats>
                            @else
                                <x-chats.bubble-chats color="bg-white" positions="star">
                                    <p class="text-gray-800 mr-14 -mb-5">
                                        {!! implode("\n", str_split($message->boddy_message, 50)) !!}
                                    </p>
                                    <div class="flex items-center  float-right">
                                        <p class="text-xs text-gray-500">
                                            {{ date('H:i', strtotime($message->created_at)) }}
                                        </p>
                                        @if (!is_null($message->read_at))
                                            <div class="fa fa-check text-xs text-green-500 ml-1"></div>
                                        @else
                                            <div class="fa fa-check text-xs text-gray-500 ml-1"></div>
                                        @endif
                                    </div>
                                </x-chats.bubble-chats>
                            @endif
                        </template>
                    </div>
                @endforeach
            @endforeach --}}

            @foreach ($chat as $index => $item)
                @foreach ($item->Messages as $message)
                    <div x-data="{
                        typeMessage: '{{ $message->type_messages }}',
                        isSender: {{ $item->sender_id == $user_login->id ? 'true' : 'false' }}
                    }">
                        <template x-if="typeMessage == 'text'">
                            <x-chats.bubble-chats
                                color="{{ $item->sender_id == $user_login->id ? 'bg-green-800' : 'bg-white' }}"
                                positions="{{ $item->sender_id == $user_login->id ? 'end' : 'star' }}">
                                <p class="mr-14 -mb-5"
                                    x-bind:class="{
                                        'text-white text-right': isSender,
                                        'text-gray-800': !isSender
                                    }">
                                    {!! implode("\n", str_split($message->boddy_message, 70)) !!}
                                </p>
                                <div class="flex items-center float-right">
                                    <p class="text-xs"
                                        x-bind:class="{
                                            'text-white': isSender,
                                            'text-gray-800': !isSender
                                        }">
                                        {{ date('H:i', strtotime($message->created_at)) }}
                                    </p>
                                    <div
                                        class="fa fa-check text-xs {{ !is_null($message->read_at)
                                            ? 'text-green-500'
                                            : ($item->sender_id == $user_login->id
                                                ? 'text-white'
                                                : 'text-gray-500') }} ml-1">
                                    </div>
                                </div>
                            </x-chats.bubble-chats>
                        </template>
                        <template x-if="typeMessage == 'voice'">
                            <x-chats.bubble-chats
                                color="{{ $item->sender_id == $user_login->id ? 'bg-green-800' : 'bg-white' }}"
                                positions="{{ $item->sender_id == $user_login->id ? 'end' : 'star' }}">
                                <p class=" mr-14 -mb-5"
                                    x-bind:class="{
                                        'text-white text-right': isSender,
                                        'text-gray-800': !isSender
                                    }">
                                    {!! implode("\n", str_split($message->boddy_message, 70)) !!}
                                </p>
                                <div class="flex items-center float-right">
                                    <p class="text-xs"
                                        x-bind:class="{
                                            'text-white': isSender,
                                            'text-gray-800': !isSender
                                        }">
                                        {{ date('H:i', strtotime($message->created_at)) }}
                                    </p>
                                    <div
                                        class="fa fa-check text-xs {{ !is_null($message->read_at)
                                            ? 'text-green-500'
                                            : ($item->sender_id == $user_login->id
                                                ? 'text-white'
                                                : 'text-gray-500') }} ml-1">
                                    </div>
                                </div>
                            </x-chats.bubble-chats>
                        </template>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>
