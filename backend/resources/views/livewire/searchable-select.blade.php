<div class="flex items-center justify-center">
      <div class="relative group z-20">
        <button id="dropdown-button" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500" wire:click="toggleSelection">
          <span class="mr-2">{{ $title }}</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </button>
        @if($open)
            <div id="dropdown-menu" class="absolute right-0 mt-2 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-1 space-y-1">
            <!-- Search input -->
            <input wire:model.live="searchBy" class="block w-full px-4 py-2 text-gray-800 border rounded-md  border-gray-300 focus:outline-none" type="text" placeholder="Suche" autocomplete="off">
            <!-- Dropdown content goes here -->
            @foreach ($this->getSelectables() as $selectable)
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md" wire:click="select({{ $selectable['id'] }})">{{ $selectable["name"] }}</a>
            @endforeach
            </div>
        @endif
      </div>
      @if($open)
       <div class="w-full h-full fixed top-0 left-0 z-10" wire:click="closeSelect()"></div>
      @endif
</div>
