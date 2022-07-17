<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row w-full justify-end">

        </div>
    </div>
    <div class="container mx-auto mt-1 bg-white shadow">
        <div class="text-2xl py-4 border-b-2 border-picton-blue">
            <div class="ml-4">
                Edit User
            </div>
        </div>
        <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800">
            <div class="pb-3 relative overflow-x-auto sm:rounded-lg">
                <x-auth-validation-errors class="mb-4" :errors="$errors"></x-auth-validation-errors>
                <form action="{{route("user.update",[$user->id])}}" method="POST">
                    @csrf
                    @method("PUT")
                    <div>
                        <x-label for="name" :value="__('Name')"></x-label>

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$user->name}}"
                                 required
                                 autofocus></x-input>
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')"></x-label>

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$user->email}}"
                                 required></x-input>
                    </div>
                    <div class="mt-4">
                        <label for="role"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Role</label>
                        <select id="role" name="role_id"
                                class="rounded-md shadow-sm border-gray-300 focus:border-picton-blue focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full peer">
                            <option disabled selected>Choose Role</option>
                            @foreach($roles as $role)
                                @if($user->role->name===$role->name)
                                <option selected value="{{$role->id}}">{{$role->name}}</option>
                                @else
                                    <option  value="{{$role->id}}">{{$role->name}}</option>
                                @endif
                            @endforeach
                        </select>
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
