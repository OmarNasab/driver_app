<x-app-layout>
    <div class="flex flex-row justify-center">
        <div
            class="my-8 mx-5 basis-1/3  max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col items-center pb-10">
                <i class="fa-solid fa-road fa-2xl items-center py-10 text-picton-blue"></i>
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Total Trips</h5>
                <span class="font-medium text-gray-500 dark:text-gray-400">{{$missions_count}}</span>
            </div>
        </div>
        <div
            class="my-8 mx-5 basis-1/3 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col items-center pb-10">
                <i class="fa-solid fa-users fa-2xl items-center py-10 text-picton-blue"></i>
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Total Drivers</h5>
                <span class="font-medium text-gray-500 dark:text-gray-400">{{count($drivers)}}</span>
            </div>
        </div>
        <div
            class="my-8 mx-5 basis-1/3 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col items-center pb-10">
                <i class="fa-solid fa-money-bill-trend-up fa-2xl items-center py-10 text-picton-blue"></i>
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Total Expenses</h5>

                <span class="font-medium text-gray-500 dark:text-gray-400">AED {{$total_expense}}</span>
            </div>
        </div>
    </div>

    <div class="flex flex-col justify-center">
        <div class="container w-3/5 mx-auto mt-1 mb-5 bg-white rounded-lg border border-gray-200 shadow-md">
            <div class="text-2xl py-4 border-b-2 border-picton-blue">
                <div class="ml-4 text-gray-500">
                    All Drivers
                </div>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Full Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email Address
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Phone Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">View</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($drivers as $driver)

                            <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{$driver->full_name}}
                                </th>
                                <td class="px-6 py-4 text-gray-900">
                                    {{$driver->email}}
                                </td>
                                <td class="px-6 py-4 text-gray-900">
                                    {{$driver->phone}}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{route("driver.show",[$driver->id])}}"
                                       class="font-medium text-picton-blue dark:text-blue-500 hover:underline">View</a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="flex flex-col justify-center">
            <div class="container w-3/5 mx-auto mt-1 mb-5 bg-white rounded-lg border border-gray-200 shadow-md">
                <div class="text-2xl py-4 border-b-2 border-picton-blue">
                    <div class="ml-4 text-gray-500">
                        Available Drivers
                    </div>
                </div>
                <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Full Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email Address
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Phone Number
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">View</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($drivers as $driver)
                                @if($driver->status==="0")
                                    <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{$driver->full_name}}
                                        </th>
                                        <td class="px-6 py-4 text-gray-900">
                                            {{$driver->email}}
                                        </td>
                                        <td class="px-6 py-4 text-gray-900">
                                            {{$driver->phone}}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="{{route("driver.show",[$driver->id])}}"
                                               class="font-medium text-picton-blue dark:text-blue-500 hover:underline">View</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-center">
                <div class="container w-3/5 mx-auto mt-1 mb-5 bg-white rounded-lg border border-gray-200 shadow-md">
                    <div class="text-2xl py-4 border-b-2 border-picton-blue">
                        <div class="ml-4 text-gray-500">
                            All Vehicles
                        </div>
                    </div>
                    <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        TRAFFIC PLATE NUMBER
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        VEHICLE TYPE
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        VEHICLE EXPIRATION DATE
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">View</span>
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
                                            {{$vehicle->expiration_date}}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="{{route("driver.show",[$vehicle->id])}}"
                                               class="font-medium text-picton-blue dark:text-blue-500 hover:underline">View</a>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="container w-3/5 mx-auto mt-1 mb-5 bg-white rounded-lg border border-gray-200 shadow-md">
                    <div class="text-2xl py-4 border-b-2 border-picton-blue">
                        <div class="ml-4 text-gray-500">
                            Current Missions
                        </div>
                    </div>
                    <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Mission ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Supervisor
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Driver Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Completed Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">View</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($current_mission as $mission)
                                    <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{$mission->id}}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$mission->user->name}}

                                        </td>
                                        <td class="px-6 py-4">
                                            {{$mission->driver->full_name}}

                                        </td>
                                        <td class="px-6 py-4">
                                            {{$mission->completed_date}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$mission->created_at}}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="{{route("mission.show",[$mission->id])}}"
                                               class="font-medium text-picton-blue dark:text-blue-500 hover:underline">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="container w-3/5 mx-auto mt-1 mb-5 bg-white rounded-lg border border-gray-200 shadow-md">
                    <div class="text-2xl py-4 border-b-2 border-picton-blue">
                        <div class="ml-4 text-gray-500">
                            Unverified Expenses
                        </div>
                    </div>
                    <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Driver Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Amount
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">View</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($unverified_expense as $expense)
                                    <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{$expense->driver->full_name}}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$expense->category}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$expense->amount}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$expense->created_at}}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="{{route("expense.show",[$expense->id])}}"
                                               class="font-medium text-picton-blue dark:text-blue-500 hover:underline">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
