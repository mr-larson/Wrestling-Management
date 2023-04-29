<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-56 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
         <li>
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" :fas="'tachometer-alt'">
                  {{ __('Dashboard') }}
            </x-nav-link>            
         </li>
         <li>
            <x-nav-link :href="route('promotion.index')" :active="request()->routeIs('promotion.*')" :fas="'building'">
                  {{ __('Promotions') }}
            </x-nav-link>  
         </li>
         <li>
            <x-nav-link :href="route('worker.index')" :active="request()->routeIs('worker.*')" :fas="'users'">
                  {{ __('Workers') }}
            </x-nav-link>
         </li>
      </ul>
   </div>  
</aside>