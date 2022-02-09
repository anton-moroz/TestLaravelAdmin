<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a new user') }}
        </h2>
    </x-slot>

    <div class="flex justify-center">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            <form class="" method="POST" action="{{ route('user.store') }}">
            @csrf

            <!-- First Name -->
            <x-form-input :name="'first_name'" :text="'First Name'" :value="old('first_name')"></x-form-input>

            <!-- Last Name -->
            <x-form-input :name="'last_name'" :text="'Last Name'" :value="old('last_name')"></x-form-input>

            <!-- Email Address -->
            <x-form-input :name="'email'" :text="'Email'" :type="'email'" :value="old('email')"></x-form-input>

            <!-- Password -->
            <x-form-input :name="'password'" :text="'Password'" :type="'password'"></x-form-input>

            <!-- Is admin -->
            <x-form-checkbox :name="'is_admin'" :text="'Admin'" :checked="old('is_admin')"></x-form-checkbox>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Add a new user') }}
                </x-button>
            </div>
            </form>
        </div>
    </div>
</x-app-layout>
