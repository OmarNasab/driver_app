<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <div class="container mx-auto mt-1 bg-white shadow ">
        <div class="text-2xl py-4 border-b-2 border-blue-500">
            <div class="ml-4">
                Roles List
            </div>
        </div>
        <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{$user->name}}
                            </th>
                            <td class="px-6 py-4">
                               {{$user->email}}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{route("role.show",[$user->id])}}"
                                   class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</a>
                                <a href="{{route("role.edit",[$user->id])}}"
                                   class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
