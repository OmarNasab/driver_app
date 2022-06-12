<x-app-layout>
    <x-slot name="header"></x-slot>
    <div class="container mx-auto mt-1 bg-white shadow ">
        <div class="text-2xl py-4 border-b-2 border-blue-500">
            <div class="ml-4">
                Driver Details
            </div>
        </div>
        <div class="container mt-4">
            <div class="ml-4 grid grid-rows-4 grid-cols-5 grid-flow-col gap-4">
                <div class="row-span-4">
                    <img class="inline" src="{{URL::asset("storage")."/".$driver->image}}" width="400" alt="document" >
                </div>
                <div class="row-span-1"><span class="font-bold">Driver Name:</span> {{$driver->full_name}}</div>
                <div class="row-span-1"><span class="font-bold">Email:</span>{{$driver->email}}</div>
                <div class="row-span-1"><span class="font-bold">Phone Number:</span> {{$driver->phone}}</div>
                <div class="row-span-1"><span class="font-bold">UAE ID:</span> {{$driver->useID}}</div>
                <div class="row-span-1"><span class="font-bold">Status:</span>
                    @if($driver->status==0)
                        Free
                    @else
                        Busy
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
