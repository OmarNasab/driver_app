<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row w-full justify-end">

        </div>
    </div>
    <div class="container mx-auto mt-1 bg-white shadow ">
        <div class="text-2xl py-4 border-b-2 border-picton-blue">
            <div class="ml-4 text-gray-500">
                Driver Details
            </div>
        </div>
        <div class="container mt-4 py-8">
            <div class="ml-4 grid grid-rows-4 grid-cols-4 grid-flow-col gap-x-8 gap-y-8">
                <div class="row-span-4">
                    <img class="inline" src="{{URL::asset("storage")."/".$driver->image}}" width="400" alt="document" >
                </div>
                <div class="row-span-1"><span class="font-bold text-gray-900">Driver Name:</span> {{$driver->full_name}}</div>
                <div class="row-span-1"><span class="font-bold text-gray-900">Email:</span> {{$driver->email}}</div>
                <div class="row-span-1"><span class="font-bold text-gray-900">Phone Number:</span> {{$driver->phone}}</div>
                <div class="row-span-1"><span class="font-bold text-gray-900">UAE ID:</span> {{$driver->uaeID}}</div>
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
</x-app-layout>
