<x-app-layout>
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Dashboard') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}
    <div class="flex flex-row justify-center">

        <div
            class="my-8 mx-5 basis-1/3  max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col items-center pb-10">
                <i class="fa-solid fa-road fa-2xl items-center py-10 text-picton-blue"></i>
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Total Trips</h5>
                <span class="font-medium text-gray-500 dark:text-gray-400">1250</span>
                <div class="flex mt-4 space-x-3 lg:mt-6">
                    <a href="#"
                       class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white bg-picton-blue rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">View
                        More</a>
                </div>
            </div>
        </div>


        <div
            class="my-8 mx-5 basis-1/3 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col items-center pb-10">
                <i class="fa-solid fa-users fa-2xl items-center py-10 text-picton-blue"></i>
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Total Drivers</h5>
                <span class="font-medium text-gray-500 dark:text-gray-400">15</span>
                <div class="flex mt-4 space-x-3 lg:mt-6">
                    <a href="#"
                       class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white bg-picton-blue rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">View
                        More</a>
                </div>
            </div>
        </div>


        <div
            class="my-8 mx-5 basis-1/3 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col items-center pb-10">
                <i class="fa-solid fa-money-bill-trend-up fa-2xl items-center py-10 text-picton-blue"></i>
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Total Expenses</h5>

                <span class="font-medium text-gray-500 dark:text-gray-400">AED 300</span>
                <div class="flex mt-4 space-x-3 lg:mt-6">
                    <a href="#"
                       class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white bg-picton-blue rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">View
                        More</a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
