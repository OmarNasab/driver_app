<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row w-full justify-end">

        </div>
    </div>
    <div class="container mx-auto mt-1 bg-white shadow ">
        <div class="text-2xl py-4 border-b-2 border-picton-blue">
            <div class="ml-4 text-gray-500">
            Vehicle Details
            </div>
        </div>
        <div class="container mt-4 py-8">
            <div class="ml-4 grid grid-rows-4 grid-cols-4 grid-flow-col gap-4">
                <div class="row-span-2 flex justify-end">
                    <form id="changeFrontPhoto" enctype="multipart/form-data" class="hidden" action="{{route("vehicle.changeFrontPhoto",[$vehicle->id])}}" method="POST">
                        @csrf
                        @method("PUT")
                        <input id="frontPhoto" type="file" name="image">
                    </form>
                    <button onclick="changeFrontPhoto()" class="appearance-none absolute"><i class="fa-solid fa-pen "></i></button>
                    <img class="inline w-full" src="{{URL::asset("storage")."/".$vehicle->license_front_side}}" width="200" alt="document" >
                </div>
                <div class="row-span-2 flex justify-end">
                    <form id="changeBackPhoto" enctype="multipart/form-data" class="hidden" action="{{route("vehicle.changeBackPhoto",[$vehicle->id])}}" method="POST">
                        @csrf
                        @method("PUT")
                        <input id="backPhoto" type="file" name="image">
                    </form>
                    <button onclick="changeBackPhoto()" class="appearance-none absolute"><i class="fa-solid fa-pen "></i></button>
                    <img class="inline w-full" src="{{URL::asset("storage")."/".$vehicle->license_back_side}}" width="200" alt="document" >
                </div>
                <div class="row-span-1"><span class="font-bold text-gray-900">Traffic Plate Number:</span> {{$vehicle->traffic_plate_number}}</div>
                <div class="row-span-1"><span class="font-bold text-gray-900">Vehicle Type:</span> {{$vehicle->type}}</div>
                <div class="row-span-1"><span class="font-bold text-gray-900">Vehicle Model:</span> {{$vehicle->model}}</div>
                <div class="row-span-1"><span class="font-bold text-gray-900">Place of Issue:</span> {{$vehicle->place_of_issue}}</div>
                <div class="row-span-1"><span class="font-bold text-gray-900">Vehicle Registration Date:</span> {{$vehicle->registration_date}}</div>
                <div class="row-span-1"><span class="font-bold text-gray-900">Vehicle Expiration Date:</span> {{$vehicle->expiration_date}}</div>
                <div class="row-span-1"><span class="font-bold text-gray-900">Insurance Expiration Date:</span> {{$vehicle->insurance_expiration_date}}</div>
                <div class="row-span-1"><span class="font-bold text-gray-900">Kilometrage:</span> {{$vehicle->kilometrage}}</div>
                <div class="row-span-1">State
                    @if($vehicle->status==0)
                        <span class="text-green-600"> Free</span>
                    @else
                    <span class="text-red-600"> Busy</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        function changeFrontPhoto(){
            $("#frontPhoto").click()
        }
        $("#frontPhoto").on("change",function (){
            $("#changeFrontPhoto").submit()
        })
        function changeBackPhoto(){
            $("#backPhoto").click()
        }
        $("#backPhoto").on("change",function (){
            $("#changeBackPhoto").submit()
        })

    </script>
</x-app-layout>
