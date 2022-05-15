<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row w-full justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Driver') }}->{{__("Driver List")}}
        </h2>
            <div>
                <x-link link="driver.create">Add Driver</x-link>
            </div>
        </div>
    </x-slot>

</x-app-layout>
