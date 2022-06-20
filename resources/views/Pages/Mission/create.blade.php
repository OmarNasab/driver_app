<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row w-full justify-end">
            <x-link link="mission.index"><i class="fa-solid fa-bars ml-1"> </i> Missions List</x-link>
        </div>
    </div>
    <div class="container mx-auto mt-1 bg-white shadow">
        <div class="text-2xl py-4 border-b-2 border-picton-blue">
            <div class="ml-4">
                New Mission
            </div>
        </div>
        <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800">
            <div class="pb-3 relative overflow-x-auto sm:rounded-lg">
            <x-auth-validation-errors class="mb-4" :errors="$errors"></x-auth-validation-errors>
            <form id="savePlace" method="POST">
                @csrf
                <input type="hidden" id="supervisor" value="{{Auth::user()->id}}">
                <div class="relative z-0 w-full mb-6 group">
                    <label for="driver_name" class="sr-only">Choose a Driver</label>
                    <select id="driver_name"
                            class="rounded-md shadow-sm border-gray-300 focus:border-picton-blue focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full peer" required>
                        <option disabled selected>Choose a Driver</option>
                        @foreach($drivers as $driver)
                            <option value="{{$driver->id}}">{{$driver->full_name}}</option>
                            @endforeach

                    </select>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label for="vehicle_name" class="sr-only">Choose a Vehicle</label>
                    <select id="vehicle_name"
                            class="rounded-md shadow-sm border-gray-300 focus:border-picton-blue focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full peer" required>
                        <option disabled selected>Choose a Vehicle</option>
                        @foreach($vehicles as $vehicle)
                            <option value="{{$vehicle->id}}">{{$vehicle->model}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="mb-6">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                    <x-input type="text" id="description" class="w-full" required></x-input>
                </div>
                <div class="grid grid-rows-1 pb-3 grid-cols-2 grid-flow-col" >
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 hidden" id="stops">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Place
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Longitude
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Latitude
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Delete</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody id="places">

                        </tbody>
                    </table>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <button type="button" data-modal-toggle="defaultModal"
                            class="text-white bg-picton-blue hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        <i class="fa-solid fa-plus"></i>Add Stop
                    </button>
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                            class="text-white bg-picton-blue hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Submit
                    </button>
                </div>

            </form>
        </div>
    </div>
    </div>

    <!-- Main modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true"
         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        New Stop
                    </h3>
                    <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="defaultModal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <form id="addPlace" class="p-3">
                    <div class="mb-6">
                        <label for="address_address"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Stop Address</label>
                        <x-input type="text" id="address-input" name="address_address"
                               class="map-input w-full"
                                 placeholder="Address" required></x-input>
                    </div>
                    <input type="hidden" name="address_latitude" id="address-latitude" value="0"/>
                    <input type="hidden" name="address_longitude" id="address-longitude" value="0"/>
                    <div id="address-map-container" style="width:100%;height:400px; ">
                        <div style="width: 100%; height: 100%" id="address-map"></div>
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <button data-modal-toggle="defaultModal" type="submit"
                                class="text-white bg-picton-blue hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Add
                        </button>
                        <button data-modal-toggle="defaultModal" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script async src="{{asset("js/maps.js")}}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAMFxLg6Qi_iib6bKjJIxyEmOPvUr7m_Y&callback=&libraries=places&callback=initialize"
        async defer
    ></script>



</x-app-layout>
