<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <div class="container mx-auto mt-1 bg-white shadow rounded p-4">
        <div class="text-2xl py-4 border-b-2 border-blue-500">
            <div class="ml-4">
                New Role
            </div>
        </div>
        <div class="container mt-4">
            <x-auth-validation-errors class="mb-4" :errors="$errors"></x-auth-validation-errors>
            <form action="{{route("user.store")}}" method="POST">
                @csrf
                <div>
                    <x-label for="name" :value="__('Name')"></x-label>

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus></x-input>
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')"></x-label>

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required></x-input>
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')"></x-label>

                    <x-input id="password" class="block mt-1 w-full"
                             type="password"
                             name="password"
                             required autocomplete="new-password"></x-input>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')"></x-label>

                    <x-input id="password_confirmation" class="block mt-1 w-full"
                             type="password"
                             name="password_confirmation" required></x-input>
                </div>

                <x-button class="ml-3">
                    {{ __('Save') }}
                </x-button>

            </form>
        </div>
    </div>

</x-app-layout>