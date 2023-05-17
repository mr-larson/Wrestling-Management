@props(['action', 'name', 'home'])
<form action="{{ $action }}" method="GET">
    @csrf
    <div class="w-full sm:w-auto pt-3">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pb-4 pointer-events-none">
                <i class="text-gray-400 fas fa-search"></i>
            </div>
            <input type="text" id="table-search" placeholder="Search for items" name="{{ $name }}" value="{{ request()->get($name) }}" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full sm:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
            <button type="reset" class="global-search-reset btn btn-secondary" data-home="{{ $home }}">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    </div>
</form>