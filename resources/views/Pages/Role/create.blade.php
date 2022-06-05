<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <div class="container mx-auto mt-1 bg-white shadow rounded p-4">
        <div class="text-2xl py-4 border-b-2 border-blue-500">
            <div class="ml-4">
                New Mission
            </div>
        </div>
        <div class="container mt-4">
            <x-auth-validation-errors class="mb-4" :errors="$errors"></x-auth-validation-errors>
            <form action="{{route("role.store")}}" method="POST">
                @csrf
                <div>
                    <x-label for="role_name" :value="__('Role Name')"></x-label>
                    <x-input id="role_name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus></x-input>
                </div>
                @foreach($permissions->getCurrentPermissions() as $permission)
                <div class="w-1/4">
                    {{$permission}}
                </div>
                @endforeach
                <x-button class="ml-3">
                    {{ __('Save') }}
                </x-button>

            </form>
        </div>
    </div>
</x-app-layout>
