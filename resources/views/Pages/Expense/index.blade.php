<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row w-full justify-end">

        </div>
    </div>
    <div class="container mx-auto">
        <div class="mb-4 border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 rounded-t-lg border-b-2" id="in-progress-tab"
                            type="button" role="tab" aria-controls="in-progress"
                            aria-selected="false">In Progress
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button
                        class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="valid-tab" type="button" role="tab"
                        aria-controls="valid" aria-selected="false">Valid
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button
                        class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="invalid-tab" type="button" role="tab" aria-controls="invalid"
                        aria-selected="false">Invalid
                    </button>
                </li>
            </ul>
        </div>
        <div class="container mx-auto mt-1 bg-white shadow">
            <div class="text-2xl py-4 border-b-2 border-picton-blue">
                <div class="ml-4 text-gray-500">
                    Expenses List
                </div>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800">
                <div id="myTabContent">
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="in-progress" role="tabpanel"
                         aria-labelledby="in-progress-tab">
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
                                @foreach($in_progress as $expense)
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
                                               class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="valid" role="tabpanel"
                         aria-labelledby="valid-tab">
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
                                @foreach($valid as $expense)
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
                                               class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="invalid" role="tabpanel"
                         aria-labelledby="invalid-tab">
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
                                @foreach($invalid as $expense)

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
                                               class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
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

    <script>
        const tabElements = [
            {
                id: 'in-progress',
                triggerEl: document.getElementById('in-progress-tab'),
                targetEl: document.getElementById('in-progress')
            },
            {
                id: 'valid',
                triggerEl: document.getElementById('valid-tab'),
                targetEl: document.getElementById('valid')
            },
            {
                id: 'invalid',
                triggerEl: document.getElementById('invalid-tab'),
                targetEl: document.getElementById('invalid')
            }
        ];

        // options with default values
        const options = {
            defaultTabId: 'settings',
            activeClasses: 'text-picton-blue hover:text-picton-blue dark:text-blue-500 dark:hover:text-blue-400 border-picton-blue dark:border-blue-500',
            inactiveClasses: 'text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300',
            onShow: () => {
                console.log('tab is shown');
            }
        };
        const tabs = new Tabs(tabElements, options);
    </script>
</x-app-layout>
