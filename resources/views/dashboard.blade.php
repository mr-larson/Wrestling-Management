<x-app-layout>
   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           {{ __('Dashboard') }}
       </h2>
   </x-slot>

   <div class="p-4 sm:ml-64">
       <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
           <div class="grid grid-cols-3 gap-4 mb-4">
               <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                   <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
               </div>
               <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                   <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
               </div>
               <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                   <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
               </div>
           </div>
           <div class="flex items-center justify-center h-52 mb-4 rounded bg-gray-50 dark:bg-gray-800">
               <canvas id="chart" style="height:400px; width:100%;"></canvas>
           </div>
           <div class="grid grid-cols-2 gap-4 mb-4">
               <div class="flex items-center justify-center rounded bg-gray-50 h-48 dark:bg-gray-800">
                   <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
               </div>
               <div class="flex items-center justify-center rounded bg-gray-50 h-48 dark:bg-gray-800">
                   <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
               </div>
           </div>
       </div>
   </div>

   
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script>
      var ctx = document.getElementById('chart').getContext('2d');
      new Chart(ctx, {
         type: 'polarArea',
         data: {
               labels: {!! json_encode($promotionNames) !!},
               datasets: [{
                  label: 'Nombre de Workers',
                  data: {!! json_encode($workerCounts) !!},
                  backgroundColor: 'rgba(0, 123, 255, 0.5)',
                  borderColor: 'rgba(0, 123, 255, 1)',
                  borderWidth: 1
               }]
         },
         options: {
               scales: {
                  y: {
                     beginAtZero: true
                  }
               }
         }
      });
   </script>

</x-app-layout>
