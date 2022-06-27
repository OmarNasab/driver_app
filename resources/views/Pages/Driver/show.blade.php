<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row w-full justify-end">

        </div>
    </div>


    <div class="container mx-auto">
        <div class="mb-4 border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 rounded-t-lg border-b-2" id="details-tab"
                            data-tabs-target="#details" type="button" role="tab" aria-controls="details"
                            aria-selected="false">Details
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button
                        class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="missions-tab" type="button" role="tab"
                        aria-controls="missions" aria-selected="false">Missions
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button
                        class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="change-password-tab" type="button" role="tab"
                        aria-controls="change-password" aria-selected="false">Change Password
                    </button>
                </li>
            </ul>
        </div>
        <div class="container mx-auto mt-1 bg-white shadow ">
            <div class="text-2xl py-4 border-b-2 border-picton-blue">
                <div class="ml-4 text-gray-500">
                    Driver Details
                </div>
            </div>
            <div class="container mt-4">
                <div id="myTabContent">
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="details" role="tabpanel"
                         aria-labelledby="details-tab">
                        <div class="container mt-4 py-8">
                            <div class="ml-4 grid grid-rows-5 grid-cols-4 grid-flow-col gap-x-8 gap-y-8">
                                <div class="row-span-4">
                                    <img class="inline" src="{{URL::asset("storage")."/".$driver->image}}" width="400"
                                         alt="document">
                                </div>
                                <div class="row-span-1">
                                    <form id="changeImage" enctype="multipart/form-data" class="hidden" action="{{route("driver.changeImage",[$driver->id])}}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <input id="image" type="file" name="image">
                                    </form>
                                    <button onclick="changePhoto()" class="text-white w-full text-center bg-picton-blue hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i class="fa-solid fa-image"></i> Change Photo</button>
                                </div>
                                <div class="row-span-1"><span
                                        class="font-bold text-gray-900">Driver Name:</span> {{$driver->full_name}}</div>
                                <div class="row-span-1"><span
                                        class="font-bold text-gray-900">Email:</span> {{$driver->email}}</div>
                                <div class="row-span-1"><span
                                        class="font-bold text-gray-900">Phone Number:</span> {{$driver->phone}}</div>
                                <div class="row-span-1"><span
                                        class="font-bold text-gray-900">UAE ID:</span> {{$driver->uaeID}}</div>
                                <div class="row-span-1"><span class="font-bold text-gray-900">Status:</span>
                                    @if($driver->status==0)
                                        <span class="text-green-600">Free</span>
                                    @else
                                        <span class="text-red-600">Busy</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="missions" role="tabpanel"
                     aria-labelledby="missions-tab">
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
                                Invoices
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
                        @foreach($driver->missions as $mission)
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
                                    @foreach($mission->invoices as $invoice)
                                        <div>{{$invoice["invoice_id"]}}</div>
                                    @endforeach
                                </td>
                                <td class="px-6 py-4">
                                    {{$mission->created_at}}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{route("mission.show",[$mission->id])}}"
                                       class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="change-password" role="tabpanel"
                     aria-labelledby="change-password-tab">

                    <div class="pb-3 relative overflow-x-auto sm:rounded-lg">
                        <x-auth-validation-errors class="mb-4" :errors="$errors"></x-auth-validation-errors>
                        <form action="{{Route("driver.changePassword",[$driver->id])}}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="py-3">
                                <x-label for="password" class="text-base" :value="__('Password')"></x-label>

                                <x-input id="password" class="block mt-1 w-full text-base" type="password"
                                         name="password"
                                         required
                                         autofocus></x-input>
                            </div>
                            <div class="py-3">
                                <x-label for="confirm_password" class="text-base"
                                         :value="__('Confirm Password')"></x-label>

                                <x-input id="confirm_password" class="block mt-1 w-full text-base" type="password"
                                         name="password_confirmation" required autofocus></x-input>
                            </div>
                            <div class="flex justify-center">
                                <x-button class="my-3 px-5">
                                    {{ __('Save') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        function changePhoto(){
            $("#image").click()
        }
        $("#image").on("change",function (){
            $("#changeImage").submit()
        })

        const tabElements = [
            {
                id: 'details',
                triggerEl: document.getElementById('details-tab'),
                targetEl: document.getElementById('details')
            },
            {
                id: 'missions',
                triggerEl: document.getElementById('missions-tab'),
                targetEl: document.getElementById('missions')
            },
            {
                id: 'change-password',
                triggerEl: document.getElementById('change-password-tab'),
                targetEl: document.getElementById('change-password')
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
