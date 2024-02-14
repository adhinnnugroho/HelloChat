@props(['sender_id' => '', 'created_chat' => '', 'read_at_chat' => '', 'isSender' => false, 'messages' => ''])
<div class="flex justify-{{ $sender_id == $user_login_id ? 'end' : 'star' }} mb-4 overflow-hidden">
    <div class="{{ $sender_id == $user_login_id ? 'bg-green-800' : 'bg-white' }} p-4 rounded-lg shadow-md max-w-2xl">
        <p class="mr-14 -mb-5"
            x-bind:class="{
                'text-white text-right': isSender,
                'text-gray-800': !isSender
            }">
            {!! implode("\n", str_split($messages, 70)) !!}
        </p>
        {{ $slot }}

        <div class="flex items-center float-right">
            <p class="text-xs"
                x-bind:class="{
                    'text-white': isSender,
                    'text-gray-800': !isSender
                }">
                {{ date('H:i', strtotime($created_chat)) }}
            </p>
            <div
                class="fa fa-check text-xs {{ !is_null($read_at_chat) ? 'text-green-500' : ($sender_id == $user_login_id ? 'text-white' : 'text-gray-500') }} ml-1">
            </div>
        </div>
    </div>
</div>
