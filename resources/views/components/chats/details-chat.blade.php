<div x-bind:class="{
    'font-bold': unreadMessagesCount > 0,
    'text-gray-500': unreadMessagesCount <= 0
}"
    {{ $attributes->merge(['class' => 'test']) }}>
    {{ $slot }}
</div>
