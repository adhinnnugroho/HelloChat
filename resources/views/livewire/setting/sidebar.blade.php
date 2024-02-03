<div>
    <div class="flex flex-col border-r-2 overflow-y-auto" style="height: 50rem">
        <div class="py-4 border-b-2  px-2"
            x-bind:class="{ 'bg-black text-white border-b-gray-600': $store.darkMode.on }">
            <div class="flex flex-wrap justify-between text-3xl">
                <div class="cursor-pointer" x-on:click="openSettingSidebar = false">
                    <i class="fa fa-arrow-left mr-5 ml-4"></i>
                    Setting
                </div>
            </div>
        </div>

        <div class="py-4 px-2">
            <input type="text" placeholder="Cari di setelan"
                class="py-2 px-2 border-2 border-gray-200 rounded-2xl w-full"
                x-bind:class="{ 'bg-black text-white border-gray-600': $store.darkMode.on }" />
        </div>



        @livewire('setting.list-setting')
    </div>
</div>
