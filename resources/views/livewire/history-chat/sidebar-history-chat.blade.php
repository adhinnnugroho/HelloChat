<div>
    <div class="flex flex-col">
        <div class="font-semibold text-xl py-4">{{ $selectedContact->getName() }}</div>
        <img src="{{ $selectedContact->getAvatar() }}" class="object-cover rounded-xl h-64" alt="" />
        <div class="font-semibold py-4">{{ $selectedContact->info_account ?? 'sibuk' }}</div>
    </div>
</div>
