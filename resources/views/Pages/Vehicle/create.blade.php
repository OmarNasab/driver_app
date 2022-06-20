<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row w-full justify-end">
            <x-link link="vehicle.index">Vehicles List</x-link>
        </div>
    </div>
    <div class="container mx-auto mt-1 bg-white shadow">
        <div class="text-2xl py-4 border-b-2 border-picton-blue">
            <div class="ml-4 text-gray-500">
                Add Vehicle
            </div>
        </div>
        <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800">
            <div class="pb-3 relative overflow-x-auto sm:rounded-lg">
                <x-auth-validation-errors class="mb-4" :errors="$errors"></x-auth-validation-errors>
                <form action="{{Route("vehicle.store")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="py-3">
                        <x-label for="traffic_plate_number" class="text-base"
                                 :value="__('Traffic Plate Number')"></x-label>

                        <x-input id="Traffic_Plate_Number" class="block mt-1 w-full text-base" type="text"
                                 name="traffic_plate_number"
                                 :value="old('traffic_plate_number')" required autofocus></x-input>
                    </div>
                    <div class="py-3">
                        <x-label for="type" class="text-base" :value="__('Vehicle Type')"></x-label>

                        <x-input id="type" class="block mt-1 w-full text-base" type="text" name="type"
                                 :value="old('type')" required autofocus></x-input>
                    </div>
                    <div class="py-3">
                        <x-label for="model" class="text-base" :value="__('Vehicle Model')"></x-label>

                        <x-input id="model" class="block mt-1 w-full text-base" type="text" name="model"
                                 :value="old('model')" required autofocus></x-input>
                    </div>

                    <div class="py-3">
                        <x-label for="place_of_issue" class="text-base" :value="__('Place of Issue')"></x-label>

                        <x-input id="place_of_issue" class="block mt-1 w-full text-base" type="text"
                                 name="place_of_issue"
                                 :value="old('place_of_issue')" required autofocus></x-input>
                    </div>

                    <div class="py-3">
                        <x-label for="registration_date" class="text-base"
                                 :value="__('Vehicle Registration Date')"></x-label>

                        <x-input id="registration_date" class="block mt-1 w-full text-base" type="date"
                                 name="registration_date"
                                 :value="old('registration_date')" required autofocus></x-input>
                    </div>
                    <div class="py-3">
                        <x-label for="expiration_date" class="text-base"
                                 :value="__('Vehicle Expiration Date')"></x-label>

                        <x-input id="expiration_date" class="block mt-1 w-full text-base" type="date"
                                 name="expiration_date"
                                 :value="old('expiration_date')" required autofocus></x-input>
                    </div>
                    <div class="py-3">
                        <x-label for="insurance_expiration_date" class="text-base"
                                 :value="__('Insurance Expiration Date')"></x-label>

                        <x-input id="insurance_expiration_date" class="block mt-1 w-full text-base" type="date"
                                 name="insurance_expiration_date"
                                 :value="old('insurance_expiration_date')" required autofocus></x-input>
                    </div>


                    <div class="py-3">
                        <x-label for="license_front_side" class="text-base"
                                 :value="__('Vehicle License Front-Side')"></x-label>
                        <x-input id="license_front_side" class="block mt-1 w-full" type="file" name="license_front_side"
                                 required autofocus></x-input>
                    </div>
                    <div class="py-3">
                        <x-label for="license_back_side" class="text-base"
                                 :value="__('Vehicle License Back-Side')"></x-label>

                        <x-input id="license_back_side" class="block mt-1 w-full" type="file" name="license_back_side"
                                 required autofocus></x-input>
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
