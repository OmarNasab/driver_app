<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row w-full justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Driver') }}->{{__("Add Driver")}}
            </h2>
            <div>
                <x-link link="driver.index">Drivers List</x-link>
            </div>
        </div>
    </x-slot>
    <x-auth-validation-errors class="mb-4" :errors="$errors"></x-auth-validation-errors>
    <form action="{{Route("driver.store")}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <x-label for="full_name" :value="__('Full Name')"></x-label>

            <x-input id="full_name" class="block mt-1 w-full" type="test" name="full_name" :value="old('full_name')" required autofocus></x-input>
        </div>
        <div>
            <x-label for="email" :value="__('Email')"></x-label>

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus></x-input>
        </div>
        <div>
            <x-label for="phone" :value="__('Phone')"></x-label>

            <x-input id="phone" class="block mt-1 w-full" type="phone" name="phone" :value="old('phone')" required autofocus></x-input>
        </div>
        <div>
            <x-label for="uaeID" :value="__('UAE ID Number')"></x-label>

            <x-input id="uaeID" class="block mt-1 w-full" type="text" name="uaeID" :value="old('uaeID')" required autofocus></x-input>
        </div>
        <div>
            <x-label for="password" :value="__('Password')"></x-label>

            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autofocus></x-input>
        </div>
        <div>
            <x-label for="confirm_password" :value="__('Confirm Password')"></x-label>

            <x-input id="confirm_password" class="block mt-1 w-full" type="password" name="password_confirmation"  required autofocus></x-input>
        </div>
        <div>
            <x-label for="image" :value="__('Image')"></x-label>

            <x-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required autofocus></x-input>
        </div>
        <x-button class="ml-3">
            {{ __('Save') }}
        </x-button>
    </form>
</x-app-layout>
