<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- First Name -->
            <x-form-input :name="'first_name'" :text="'First Name'" :value="old('first_name')"></x-form-input>

            <!-- Last Name -->
            <x-form-input :name="'last_name'" :text="'Last Name'" :value="old('last_name')"></x-form-input>

            <!-- Email Address -->
            <x-form-input :name="'email'" :text="'Email'" :type="'email'" :value="old('email')"></x-form-input>

            <!-- Password -->
            <x-form-input :name="'password'" :text="'Password'" :type="'password'"></x-form-input>

            <!-- Confirm Password -->
            <x-form-input :name="'password_confirmation'" :text="'Confirm Password'" :type="'password'"></x-form-input>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
