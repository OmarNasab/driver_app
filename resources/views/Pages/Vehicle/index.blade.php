<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row w-full justify-end">
            <x-link link="vehicle.create">Add Vehicle</x-link>
        </div>
    </div>
    <div class="container mx-auto mt-1 bg-white shadow">
        <div class="text-2xl py-4 border-b-2 border-picton-blue">
            <div class="ml-4 text-gray-500">
            Vehicles List
            </div>
        </div>
        <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                        Traffic Plate Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                        Vehicle Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                        Vehicle Model
                        </th>
                        <th scope="col" class="px-6 py-3">
                        Place of Issue
                        </th>
                        <th scope="col" class="px-6 py-3">
                        Vehicle Registration Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                        Vehicle Expiration Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                        Insurance Expiration Date
                        </th>

                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vehicles as $vehicle)
                        <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{$vehicle->traffic_plate_number}}
                            </th>
                            <td class="px-6 py-4 text-gray-900">
                                {{$vehicle->type}}
                            </td>
                            <td class="px-6 py-4 text-gray-900">
                                {{$vehicle->model}}
                            </td>
                            <td class="px-6 py-4 text-gray-900">
                                {{$vehicle->place_of_issue}}
                            </td>
                            <td class="px-6 py-4 text-gray-900">
                                {{$vehicle->registration_date}}
                            </td>
                            <td class="px-6 py-4 text-gray-900">
                                {{$vehicle->expiration_date}}
                            </td>
                            <td class="px-6 py-4 text-gray-900">
                                {{$vehicle->insurance_expiration_date}}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{route("vehicle.show",[$vehicle->id])}}"
                                   class="font-medium text-picton-blue dark:text-blue-500 hover:underline">View</a>
                                <a href="{{route("vehicle.edit",[$vehicle->id])}}"
                                   class="font-medium text-picton-blue dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
