<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row w-full justify-end">
            <x-link link="driver.index">Driver List</x-link>
        </div>
    </div>
    <div class="container mx-auto mt-1 bg-white shadow">
        <div class="text-2xl py-4 border-b-2 border-picton-blue">
            <div class="ml-4 text-gray-500">
                Add Driver
            </div>
        </div>
        <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800">
            <div class="pb-3 relative overflow-x-auto sm:rounded-lg">
                <x-auth-validation-errors class="mb-4" :errors="$errors"></x-auth-validation-errors>
                <form action="{{Route("driver.store")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="py-3">
                        <x-label for="full_name" class="text-base" :value="__('Full Name')"></x-label>

                        <x-input id="full_name" class="block mt-1 w-full text-base" type="text" name="full_name"
                                 :value="old('full_name')" required autofocus></x-input>
                    </div>
                    <div class="py-3">
                        <x-label for="email" class="text-base" :value="__('Email')"></x-label>

                        <x-input id="email" class="block mt-1 w-full text-base" type="email" name="email"
                                 :value="old('email')" required autofocus></x-input>
                    </div>
                    <div class="py-3">
                        <x-label for="phone" class="text-base" :value="__('Phone')"></x-label>

                        <x-input id="phone" class="block mt-1 w-full text-base" type="tel" name="phone"
                                 :value="old('phone')" required autofocus></x-input>
                    </div>
                    <div class="py-3">
                        <x-label for="uaeID" class="text-base" :value="__('UAE ID Number')"></x-label>

                        <x-input id="uaeID" class="block mt-1 w-full text-base" type="text" name="uaeID"
                                 :value="old('uaeID')" required autofocus></x-input>
                    </div>
                    <div class="py-3">
                        <x-label for="password" class="text-base" :value="__('Password')"></x-label>

                        <x-input id="password" class="block mt-1 w-full text-base" type="password" name="password"
                                 required
                                 autofocus></x-input>
                    </div>
                    <div class="py-3">
                        <x-label for="confirm_password" class="text-base" :value="__('Confirm Password')"></x-label>

                        <x-input id="confirm_password" class="block mt-1 w-full text-base" type="password"
                                 name="password_confirmation" required autofocus></x-input>
                    </div>
                    <div class="py-3">
                        <x-label for="image" class="text-base" :value="__('Image')"></x-label>

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
