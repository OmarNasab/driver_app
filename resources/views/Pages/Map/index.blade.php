<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row w-full justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Map') }}
            </h2>

        </div>
    </x-slot>
    <div id="map" style="height: 500px">
    </div>
    <script>
        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: { lat: 0, lng: -180 },
                mapTypeId: "terrain",
            });
            const flightPlanCoordinates = [


            ];
            const flightPath = new google.maps.Polyline({
                path: flightPlanCoordinates,
                geodesic: true,
                strokeColor: "#FF0000",
                strokeOpacity: 1.0,
                strokeWeight: 2,
            });

            flightPath.setMap(map);
        }
    </script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAMFxLg6Qi_iib6bKjJIxyEmOPvUr7m_Y&callback=initMap&v=weekly"
        async
    ></script>

</x-app-layout>
