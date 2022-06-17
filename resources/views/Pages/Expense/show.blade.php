<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row w-full">
            @if($expense->status==0)
                <a type="button"
                   href="{{route("expenseVerify",[$expense->id,1])}}"
                   class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    <i class="fa-solid fa-check"></i> Accept
                </a>
                <a type="button"
                   href="{{route("expenseVerify",[$expense->id,2])}}"
                   class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                    <i class="fa-solid fa-x"></i> Reject
                </a>
            @endif
        </div>
    </div>

    <div class="container mx-auto mt-1 bg-white shadow ">
        <div class="text-2xl py-4 border-b-2 border-picton-blue">
            <div class="ml-4">
                Expense Details
            </div>
        </div>
        <div class="container mt-4">
            <div class="ml-4 grid grid-rows-5 grid-cols-5 grid-flow-col gap-4">
                <div class="row-span-4">
                    <img class="inline" src="{{URL::asset("storage")."/".$expense->attachment}}" width="400" alt="document" >
                </div>
                <div class="row-span-1">
                    <a type="button" href="{{route("downloadImage",[$expense->id])}}" target="_blank" class="text-white w-full text-center bg-picton-blue hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i class="fa-solid fa-cloud-arrow-down"></i> Download</a>
                </div>
                <div class="row-span-1"><span class="font-bold">Driver Name:</span> {{$expense->driver->full_name}}</div>
                <div class="row-span-1"><span class="font-bold">Amount:</span> AED{{$expense->amount}}</div>
                <div class="row-span-3 col-span-2">
                    <span class="font-bold">Description:</span>
                <div>{{$expense->description}}</div>
                </div>
                <div class="row-span-1"><span class="font-bold">Category:</span> {{$expense->category}}</div>
                <div class="row-span-1"><span class="font-bold">Status:</span>
                    @if($expense->status==0)
                        Not Verified
                    @elseif($expense->status==1)
                        Approved
                    @else
                        Rejected
                    @endif
                </div>
                <div class="row-span-1"><span class="font-bold">Date:</span> {{$expense->created_at}}</div>
                @if($expense->status!=0)
                <div class="row-span-1"><span class="font-bold">Verified By</span> {{$expense->user->name}}</div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
