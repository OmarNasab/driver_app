<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row w-full justify-end">
            <x-link link="role.index">Roles List</x-link>
        </div>
    </div>

    <div class="container mx-auto mt-1 bg-white shadow">
        <div class="text-2xl py-4 border-b-2 border-picton-blue">
            <div class="ml-4">
                New Role
            </div>
        </div>
        <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800">
            <div class="pb-3 relative overflow-x-auto sm:rounded-lg">
            <x-auth-validation-errors class="mb-4" :errors="$errors"></x-auth-validation-errors>
            <form action="{{route("role.store")}}" method="POST">
                @csrf
                <div>
                    <x-label for="role_name" :value="__('Role Name')"></x-label>
                    <x-input id="role_name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus></x-input>
                </div>
                <div class="grid grid-cols-4">
                @foreach($permissions->getCurrentPermissions() as $permission)
                <div class="row-span-1 py-5 px-3">
                    <label class="px-5">
                        <input class="w-4 h-4 py-3 px-3 text-picton-blue bg-gray-100 rounded border-picton-blue focus:ring-blue-500 dark:focus:-ring-blue600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox" name="permissions[]" value="{{$permission}}">
                        {{$permissions->getRoleName($permission)}}
                    </label>
                </div>
                @endforeach
                </div>
                <div class="flex justify-center">
                    <x-button class="my-3">
                        {{ __('Save') }}
                    </x-button>
                </div>


            </form>
        </div>
        </div>
    </div>
</x-app-layout>
