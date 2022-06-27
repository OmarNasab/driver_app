<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row w-full justify-end">
            <x-link link="driver.create">Add Driver</x-link>
        </div>
    </div>
    <div class="container mx-auto mt-1 bg-white shadow">
        <div class="text-2xl py-4 border-b-2 border-picton-blue">
            <div class="ml-4 text-gray-500">
                Drivers List
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
                            <span class="sr-only">Edit</span>
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
                                <form action="{{route("driver.destroy",[$driver->id])}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <a href="{{route("driver.show",[$driver->id])}}"
                                       class="font-medium text-picton-blue dark:text-blue-500 hover:underline">View</a>
                                    <a href="{{route("driver.edit",[$driver->id])}}"
                                       class="font-medium text-picton-blue dark:text-blue-500 hover:underline">Edit</a>
                                    <button type="submit"
                                       class="font-medium text-picton-blue dark:text-blue-500 hover:underline">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
