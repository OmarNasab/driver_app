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
                <div class="grid grid-cols-4">
                @foreach($permissions->getCurrentPermissions() as $permission)
                <div class="row-span-1">
                    <label>
                        <input class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox" name="permissions[]" value="{{$permission}}">
                        {{$permissions->getRoleName($permission)}}
                    </label>
                </div>
                @endforeach
                </div>
                <x-button class="ml-3">
                    {{ __('Save') }}
                </x-button>

            </form>
        </div>
    </div>
</x-app-layout>
