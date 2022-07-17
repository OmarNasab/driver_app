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
                <form action="{{route("user.changePassword",[$user->id])}}" method="POST">
                    @csrf
                    @method("PUT")
                    <div>
                        <x-label for="password" :value="__('New Password')"></x-label>

                        <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                                 required
                                 autofocus></x-input>
                    </div>
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirm Password')"></x-label>

                        <x-input id="password_confirmation" class="block mt-1 w-full"
                                 type="password"
                                 name="password_confirmation" required></x-input>
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
