<?php
$directions=[];

?>
@foreach($mission->direction as $stop)
    @foreach($stop["direction"] as $direction)
       {{array_push($directions,[$direction["lat"],$direction["long"]])}}
    @endforeach
@endforeach

<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <div class="container mx-auto">
        <div class="mb-4 border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 rounded-t-lg border-b-2" id="details-tab"
                            data-tabs-target="#details" type="button" role="tab" aria-controls="details"
                            aria-selected="false">Details
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button
                        class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="direction-tab" data-tabs-target="#direction" type="button" role="tab"
                        aria-controls="direction" aria-selected="false">Directions
                    </button>
                </li>
            </ul>
        </div>


        <div class="container mx-auto mt-1 bg-white shadow ">
            <div class="text-2xl py-4 border-b-2 border-blue-500">
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
                            <div class="row-span-1">
                                <div class=" w-full font-bold">Completed Date:</div> {{$mission->completed_date}}
                            </div>
                        </div>
                    </div>
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="direction" role="tabpanel"
                         aria-labelledby="direction-tab">
                        <div id="map" style="height: 500px">
                        </div>
                        <label for="default-range" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default range</label>
                        <input id="default-range" type="range" value="1" min="1" max="{{count($directions)}}" onchange="changeMarker()" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var map;
        var markersArray = [];
        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: {
                    lat: {{$mission->direction[0]["direction"][0]["lat"]}},
                    lng: {{$mission->direction[0]["direction"][0]["long"]}},
                    mapTypeId: "terrain",
                }
            });
            const flightPlanCoordinates = [

                    @foreach($directions as $direction)

                {
                    lat: {{$direction[0]}}, lng: {{$direction[1]}}
                },
                @endforeach
            ];
            addMarker({{$directions[0][0]}},{{$directions[0][1]}})
            const flightPath = new google.maps.Polyline({
                path: flightPlanCoordinates,
                geodesic: true,
                strokeColor: "#FF0000",
                strokeOpacity: 1.0,
                strokeWeight: 2,
            });

            flightPath.setMap(map);
        }

        function addMarker(lat,long) {

             marker = new google.maps.Marker({
                position: new google.maps.LatLng(lat,long),
                map: map
            })
            markersArray.push(marker)

        }

        function changeMarker(){
            markersArray[0].setMap(null)
            markersArray.length=0;
            let directions={{json_encode($directions)}};
            let value=document.getElementById("default-range").value;
            addMarker(directions[value-1][0],directions[value-1][1])
        }
    </script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAMFxLg6Qi_iib6bKjJIxyEmOPvUr7m_Y&callback=initMap&v=weekly"
        async
    ></script>
</x-app-layout>
