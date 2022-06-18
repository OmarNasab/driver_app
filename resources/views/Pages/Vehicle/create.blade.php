<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row w-full justify-end">
            <x-link link="driver.index">List of Vehicle</x-link>
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
                <form action="{{Route("driver.store")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>Vehicle Details</div>
                    <div class="py-3">
                        <x-label for="traffic_plate_number" class="text-base" :value="__('Traffic Plate Number')"></x-label>

                        <x-input id="Traffic_Plate_Number" class="block mt-1 w-full text-base" type="text" name="traffic_plate_number"
                                 :value="old('Traffic_Plate_Number')" required autofocus></x-input>
                    </div>
                    <div class="py-3">
                        <x-label for="vehicle_type" class="text-base" :value="__('Vehicle Type')"></x-label>

                        <x-input id="Vehicle_Type" class="block mt-1 w-full text-base" type="text" name="vehicle_type"
                                 :value="old('Vehicle_Type')" required autofocus></x-input>
                    </div>
                    <div class="py-3">
                        <x-label for="vehicle_model" class="text-base" :value="__('Vehicle Model')"></x-label>

                        <x-input id="vehicle_model" class="block mt-1 w-full text-base" type="text" name="vehicle_model"
                                 :value="old('Vehicle_Model')" required autofocus></x-input>
                    </div>

                    <div class="py-3">
                        <x-label for="place_of_issue" class="text-base" :value="__('Place of Issue')"></x-label>

                        <x-input id="Place_of_Issue" class="block mt-1 w-full text-base" type="text" name="place_of_issue"
                                 :value="old('Place_of_Issue')" required autofocus></x-input>
                    </div>

                    <div class="py-3">
                        <x-label for="vehicle_registration_date" class="text-base" :value="__('Vehicle Registration Date')"></x-label>

                        <x-input id="vehicle_registration_date" class="block mt-1 w-full text-base" type="date" name="vehicle_registration_date"
                                 :value="old('vehicle_registration_date')" required autofocus></x-input>
                    </div>
                    <div class="py-3">
                        <x-label for="vehicle_expiration_date" class="text-base" :value="__('Vehicle Expiration Date')"></x-label>

                        <x-input id="vehicle_expiration_date" class="block mt-1 w-full text-base" type="date" name="vehicle_expiration_date"
                                 :value="old('vehicle_expiration_date')" required autofocus></x-input>
                    </div>
                    <div class="py-3">
                        <x-label for="insurance_expiration_date" class="text-base" :value="__('Insurance Expiration Date')"></x-label>

                        <x-input id="insurance_expiration_date" class="block mt-1 w-full text-base" type="date" name="insurance_expiration_date"
                                 :value="old('insurance_expiration_date')" required autofocus></x-input>
                    </div>


                    <div class="py-3">
                        <x-label for="image" class="text-base" :value="__('Image')">Vehicle License Front-Side</x-label>

                        <x-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')"
                                 required autofocus></x-input>
                    </div>
                    <div class="py-3">
                        <x-label for="image" class="text-base" :value="__('Image')">Vehicle License Back-Side</x-label>

                        <x-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')"
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
