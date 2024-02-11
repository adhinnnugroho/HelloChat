<div>
    <div class="flex px-5 flex-col mt-24 flex-grow overflow-y-auto h-screen">
        <div class="flex-grow overflow-y-auto">
            @foreach ($chat as $index => $item)
                @foreach ($item->Messages as $message)
                    @if ($item->sender_id == $user_login->id)
                        <div class="flex justify-end mb-4 overflow-hidden">
                            <div class="bg-green-800  p-4 rounded-lg shadow-md max-w-2xl">
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
                            </div>
                        </div>
                    @else
                        <div class="flex justify-star mb-4">
                            <div class="bg-white p-4 rounded-lg shadow-md max-w-2xl">
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
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
</div>
