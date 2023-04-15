<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-56 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
       <ul class="space-y-2 font-medium">
          <li>
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" :fas="'tachometer-alt'">
                {{ __('Dashboard') }}
            </x-nav-link>            
          </li>
          <li>
            <x-nav-link :href="route('promotions.index')" :active="request()->routeIs('promotions.*')" :fas="'building'">
                {{ __('Promotions') }}
            </x-nav-link>  
          </li>
       </ul>
       <div id="dropdown-cta" class="p-4 mt-6 rounded-lg bg-blue-50 dark:bg-blue-900" role="alert">
        <div class="flex items-center mb-3">
           <span class="bg-orange-100 text-orange-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-orange-200 dark:text-orange-900">Beta</span>
           <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-900 rounded-lg focus:ring-2 focus:ring-blue-400 p-1 hover:bg-blue-200 inline-flex h-6 w-6 dark:bg-blue-900 dark:text-blue-400 dark:hover:bg-blue-800" data-dismiss-target="#dropdown-cta" aria-label="Close">
                 <span class="sr-only">Close</span>
                 <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
           </button>
        </div>
        <p class="mb-3 text-sm text-blue-800 dark:text-blue-400">
           Preview the new management.app for rankings and promotions.
        </p>
     </div>
    </div>  
 </aside>