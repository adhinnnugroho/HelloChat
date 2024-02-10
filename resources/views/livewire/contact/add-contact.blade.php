<div>
    <x-navbar.navbar-back title="Add Contact" icons="fa-arrow-left" actions="AddContact" />

    <div class="mt-10">
        <div wire:loading.remove wire:target="validationFrom">
            <x-input.border-input type="text" placeholder="Name" label="Name" wire:model.defer="contact.name" />
            @error('contact.name')
                <span class="error text-red-500 ml-3">{{ $message }}</span>
            @enderror
            <x-input.border-input type="text" placeholder="arun_w32" label="Code Hello"
                wire:model.defer="contact.code" />
            @error('contact.code')
                <span class="error text-red-500 ml-3">{{ $message }}</span>
            @enderror
            <div class="p-3">
                <x-button.rounded-button class="text-ubuntu text-base w-full mt-5" color="gold"
                    wire:click="validationFrom">
                    <div wire:loading.remove wire:target="validationFrom">
                        {{ __('Save') }}
                    </div>
                    <div wire:loading wire:target="validationFrom">
                        <i class="fa fa-circle-notch fa-spin mr-2"></i>
                        {{ __('Prosessing..') }}
                    </div>
                </x-button.rounded-button>
            </div>
        </div>

        <div wire:loading wire:target="validationFrom">
            <x-loading.rocket-loading />
        </div>

    </div>
</div>
