<div>
    <div class="flex flex-col">
        <x-navbar.navbar-back title="Setting" icons="fa-arrow-left" actions="openSettingSidebar" />
        <x-input.border-input type="text" placeholder="Search Setting" />
        @livewire('setting.list-setting')
    </div>
</div>
