<div class="mx-auto max-w-screen min-h-screen" x-bind:class="{ 'bg-black text-white border-black': $store.darkMode.on }">
    <div class="grid lg:grid-cols-2 grid-cols-1 gap-6 lg:ml-10">
        <div class="col-span-1">
            <div class="fixed top-[150px] hidden lg:block">
                <img src="{{ asset('/assets/img/signup-image.svg') }}" class="w-[660px]" alt="">
            </div>
        </div>
        <div class="col-span-1">
            <div class="my-[70px]">
                <div class="font-semibold text-[26px] mb-3">
                    Welcome Back
                </div>
                <p class="text-base text-[#767676] leading-7">
                    Lorem ipsum dolor sit <br>
                    the better insight for your life
                </p>
            </div>

            <div class="flex flex-col gap-6">
                <div>
                    <x-input.simple-input type="email" wire:model.defer="email" placeholder="Your email..."
                        label="Email Address" error="email" />
                </div>
                <div>
                    <x-input.simple-input type="password" wire:model.defer="password" placeholder="***" label="Password"
                        error="password" />
                </div>
                <button type="submit" class="rounded-2xl bg-alerange py-[13px] text-center"
                    wire:click="validationsForm">
                    <span class="text-base font-semibold" wire:loading.remove>
                        Login
                    </span>
                    <div wire:loading wire:target="validationsForm">
                        Processing...
                    </div>
                </button>

                <a href="{{ route('google.actions') }}" class="rounded-2xl border border-white py-[13px] text-center">
                    <span class="text-base">
                        <i class="fa-brands fa-google"></i> Login With Google
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
