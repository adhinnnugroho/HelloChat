<div class="py-4 border-b-2 bg-gray-200 px-2">
    <div class="flex flex-wrap justify-between">
        <div>
            @if (stripos($userLogin->avatar, 'images/') !== false)
                <img src="{{ asset('/storage/' . $userLogin->avatar) }}" alt=""
                    class="rounded-full h-12 w-12 ml-3 cursor-pointer"
                    x-on:click="openSettingSidebar = !openSettingSidebar">
            @else
                <img src="{{ $userLogin->avatar }}" alt="" class="rounded-full h-12 w-12 ml-3 cursor-pointer"
                    x-on:click="openSettingSidebar = !openSettingSidebar">
            @endif
        </div>
        <div class="float-right" x-data="{ isOpen: false }">
            <div class="grid grid-cols-2 gap-3 mt-1 relative">
                <!-- Tambahkan aksi x-on:click untuk menampilkan/sembunyikan menu -->
                <i class="fa fa-ellipsis-vertical text-3xl cursor-pointer" x-on:click="isOpen = !isOpen"></i>

                <!-- Menu konteks atau dropdown -->
                <ul x-show="isOpen" style="display: none;"
                    class="absolute right-0 mt-8 shadow w-36 bg-white border
                    rounded-lg text-black">
                    @livewire('new-contact.add-new-contact')
                    <li class="p-2 hover:bg-gray-300 cursor-pointer"
                        x-on:click="openSettingSidebar = !openSettingSidebar">
                        <a href="#">Setelan</a>
                    </li>
                    <a href="{{ route('logout') }}">
                        <li class="p-2 hover:bg-gray-300 cursor-pointer">
                            Logout
                        </li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
</div>
