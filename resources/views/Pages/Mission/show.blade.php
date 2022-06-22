<?php
$directions = [];
?>
@foreach($mission->direction as $stop)
    @foreach($stop["direction"] as $direction)
        @php(array_push($directions,[$direction["lat"],$direction["long"],$direction["time"]]))
    @endforeach
@endforeach



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
                @if(count($mission->direction)!=0)
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="direction-tab" type="button" role="tab"
                            aria-controls="direction" aria-selected="false">Directions
                        </button>
                    </li>
                @endif
            </ul>
        </div>


        <div class="container mx-auto mt-1 bg-white shadow ">
            <div class="text-2xl py-4 border-b-2 border-picton-blue">
                <div class="ml-4">
                    Mission Details
                </div>
            </div>
            <div class="container mt-4">
                <div id="myTabContent">
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="details" role="tabpanel"
                         aria-labelledby="details-tab">
                        <div class="ml-4 grid grid-rows-3 grid-cols-3 grid-flow-col gap-4">
                            <div class="row-span-1">
                                <div class="w-full font-bold">Supervisor Name</div>
                                <div class="w-full ">{{$mission->user->name}}</div>
                            </div>
                            <div class="row-span-1">
                                <div class="w-full font-bold">Driver Name</div>
                                <div class="w-full ">{{$mission->driver->full_name}}</div>
                            </div>
                            <div class="row-span-1 col-span-2">
                                <span class="font-bold">Description:</span>
                                <div class="w-full">{{$mission->description}}</div>
                            </div>
                            <div class="row-span-1">
                                <div class="font-bold">Status:</div>
                                <div class="w-full">
                                    @if($mission->status==0)
                                        In Progress
                                    @elseif($mission->status==1)
                                        Completed
                                    @endif
                                </div>
                            </div>
                            <div class="row-span-1">
                                <div class="w-full font-bold">Last Destination
                                </div>{{$mission->stops[count($mission->stops)-1]["name"]}}</div>
                            <div class="row-span-1">
                                <div class=" w-full font-bold">Assigned Date:</div> {{$mission->created_at}}
                            </div>
                            @if($mission->status==1)
                                <div class="row-span-1">
                                    <div class=" w-full font-bold">Completed Date:</div> {{$mission->completed_date}}
                                </div>
                            @endif
                        </div>
                        @if($mission->type==="delivery")
                            <table class="w-1/2 mt-4 text-sm text-center text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Invoice ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Recipient Name
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($mission->invoices as $invoice)
                                    <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{$invoice["invoice_id"]}}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$invoice["recipient_name"]}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    @if(count($mission->direction)!=0)
                        <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="direction" role="tabpanel"
                             aria-labelledby="direction-tab">
                            <div id="map" style="height: 500px">
                            </div>
                            <label for="default-range"
                                   class="block text-center mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Time: <span id="time"></span> </label>
                            <input id="default-range" type="range" value="1" min="1"
                                   max="{{count($mission->direction[0]["direction"])}}" onchange="changeMarker()"
                                   class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Destination
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">View</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($mission->direction as $index => $stop)
                                    <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{$stop["name"]}}
                                        </th>
                                        <td class="px-6 py-4 text-right">
                                            <button onclick="changePolyLine({{$index}})"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                View
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if(count($mission->direction)!=0)
        <script>
            var map;
            var markersArray = [];
            var polyLinesArray = [];
            var paths = [];
            var currentIndex = 0;
            var timestampsArray =[];
            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 15,
                    center: {
                        lat: {{$mission->direction[0]["direction"][0]["lat"]}},
                        lng: {{$mission->direction[0]["direction"][0]["long"]}},
                        mapTypeId: "terrain",
                    }
                });
                addMarker({{$directions[0][0]}}, {{$directions[0][1]}})
                document.getElementById("time").innerText=getDateTime({{$directions[0][2]}})
                let flightPath;
                @foreach($mission->direction as $stop)
                var path = [@foreach($stop["direction"] as $direction)
                {
                    lat: {{$direction["lat"]}}, lng: {{$direction["long"]}}

                },
                    @endforeach
                ]
                flightPath = new google.maps.Polyline({
                    path: path,
                    geodesic: true,
                    strokeColor: "#FF0000",
                    strokeOpacity: 1.0,
                    strokeWeight: 2,
                });
                var timestamps=[]
                @foreach($stop["direction"] as $direction)
                    timestamps.push({{$direction["time"]}})
                    @endforeach
                        timestampsArray.push(timestamps)
                paths.push(path)
                polyLinesArray.push(flightPath)
                @endforeach
                    polyLinesArray[0].setMap(map);
            }

            function addMarker(lat, long) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(lat, long),
                    map: map
                })
                markersArray.push(marker)
            }

            function changeMarker() {
                markersArray[0].setMap(null)
                markersArray.length = 0;
                let value = document.getElementById("default-range").value;
                document.getElementById("time").innerText=getDateTime(timestampsArray[currentIndex][value - 1])
                addMarker(paths[currentIndex][value - 1]["lat"], paths[currentIndex][value - 1]["lng"])
            }

            function changePolyLine(index) {
                for (let i = 0; i < polyLinesArray.length; i++) {
                    polyLinesArray[i].setMap(null)
                }
                currentIndex = index;
                document.getElementById("default-range").value = 1;
                document.getElementById("default-range").setAttribute("max", paths[index].length)
                polyLinesArray[index].setMap(map)
                changeMarker()
            }
            function getDateTime(timestamp){
                let date=new Date(timestamp)
                date=date.getDate()+
                    "/"+(date.getMonth()+1)+
                    "/"+date.getFullYear()+
                    " "+date.getHours()+
                    ":"+date.getMinutes()+
                    ":"+date.getSeconds()
                return date;
            }
        </script>

        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAMFxLg6Qi_iib6bKjJIxyEmOPvUr7m_Y&callback=initMap&v=weekly"
            async
        ></script>
    @endif
    <script>
        const tabElements = [
            {
                id: 'details',
                triggerEl: document.getElementById('details-tab'),
                targetEl: document.getElementById('details')
            },
                @if(count($mission->direction)!=0)
            {
                id: 'direction',
                triggerEl: document.getElementById('direction-tab'),
                targetEl: document.getElementById('direction')
            },
            @endif
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
