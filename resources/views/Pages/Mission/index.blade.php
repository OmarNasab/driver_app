<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row w-full justify-end">
            <div>
                <x-link link="mission.create"><i class="fa-solid fa-plus"></i> New Mission</x-link>
            </div>
        </div>
    </x-slot>
    <div class="container mx-auto">
        <div class="mb-4 border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 rounded-t-lg border-b-2" id="in-progress-tab"
                            data-tabs-target="#in-progress" type="button" role="tab" aria-controls="in-progress"
                            aria-selected="false">In Progress
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button
                        class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="completed-tab" data-tabs-target="#completed" type="button" role="tab"
                        aria-controls="completed" aria-selected="false">Completed
                    </button>
                </li>
            </ul>
        </div>
        <div id="myTabContent">
            <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="in-progress" role="tabpanel"
                 aria-labelledby="in-progress-tab">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">View</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($in_progress as $mission)
                            <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{$mission->id}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$mission->user->name}}

                                </td>
                                <td class="px-6 py-4">
                                    {{$mission->driver->full_name}}

                                </td>
                                <td class="px-6 py-4">
                                    {{$mission->created_at}}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{route("mission.show",[$mission->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="completed" role="tabpanel"
                 aria-labelledby="completed-tab">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                        @foreach($completed as $mission)
                            <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
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
                                    <a href="{{route("mission.show",[$mission->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        const tabElements = [
            {
                id: 'in-progress',
                triggerEl: document.getElementById('in-progress-tab'),
                targetEl: document.getElementById('in-progress')
            },
            {
                id: 'completed',
                triggerEl: document.getElementById('completed-tab'),
                targetEl: document.getElementById('completed')
            }
        ];

        // options with default values
        const options = {
            defaultTabId: 'settings',
            activeClasses: 'text-red-200 hover:text-gray-600 dark:text-blue-500 dark:hover:text-blue-400 border-gray-600 dark:border-blue-500',
            inactiveClasses: 'text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300',
            onShow: () => {
                console.log('tab is shown');
            }
        };
        const tabs = new Tabs(tabElements, options);
    </script>
</x-app-layout>
