<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row w-full justify-end">

        </div>
    </div>

    <div class="container mx-auto mt-1 bg-white shadow">
        <div class="text-2xl py-4 border-b-2 border-picton-blue">
            <div class="ml-4 text-gray-500">
                Edit Vehicle
            </div>
        </div>
        <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800">
            <div class="pb-3 relative overflow-x-auto sm:rounded-lg">
                <x-auth-validation-errors class="mb-4" :errors="$errors"></x-auth-validation-errors>
                <form action="{{Route("vehicle.update",[$vehicle->id])}}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="py-3">
                        <x-label for="traffic_plate_number" class="text-base"
                                 :value="__('Traffic Plate Number')"></x-label>

                        <x-input id="Traffic_Plate_Number" class="block mt-1 w-full text-base" type="text"
                                 name="traffic_plate_number"
                                 value="{{$vehicle->traffic_plate_number}}" required autofocus></x-input>
                    </div>
                    <div class="py-3">
                        <x-label for="type" class="text-base" :value="__('Vehicle Type')"></x-label>

                        <x-input id="type" class="block mt-1 w-full text-base" type="text" name="type"
                                 value="{{$vehicle->type}}" required autofocus></x-input>
                    </div>
                    <div class="py-3">
                        <x-label for="model" class="text-base" :value="__('Vehicle Model')"></x-label>

                        <x-input id="model" class="block mt-1 w-full text-base" type="text" name="model"
                                 value="{{$vehicle->model}}" required autofocus></x-input>
                    </div>

                    <div class="py-3">
                        <x-label for="place_of_issue" class="text-base" :value="__('Place of Issue')"></x-label>

                        <x-input id="place_of_issue" class="block mt-1 w-full text-base" type="text"
                                 name="place_of_issue"
                                 value="{{$vehicle->place_of_issue}}" required autofocus></x-input>
                    </div>

                    <div class="py-3">
                        <x-label for="registration_date" class="text-base"
                                 :value="__('Vehicle Registration Date')"></x-label>

                        <x-input id="registration_date" class="block mt-1 w-full text-base" type="date"
                                 name="registration_date"
                                 value="{{$vehicle->registration_date}}" required autofocus></x-input>
                    </div>
                    <div class="py-3">
                        <x-label for="expiration_date" class="text-base"
                                 :value="__('Vehicle Expiration Date')"></x-label>

                        <x-input id="expiration_date" class="block mt-1 w-full text-base" type="date"
                                 name="expiration_date"
                                 value="{{$vehicle->expiration_date}}" required autofocus></x-input>
                    </div>
                    <div class="py-3">
                        <x-label for="insurance_expiration_date" class="text-base"
                                 :value="__('Insurance Expiration Date')"></x-label>

                        <x-input id="insurance_expiration_date" class="block mt-1 w-full text-base" type="date"
                                 name="insurance_expiration_date"
                                 value="{{$vehicle->insurance_expiration_date}}" required autofocus></x-input>
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
</x-app-layout>
