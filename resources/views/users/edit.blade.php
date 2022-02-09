<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between mb-2 mr-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ Auth::id() === $user->id ? __('Your account preferences') : __('Edit user') }}
            </h2>
            <div>
                <a class="items-center" href="{{ route('user.show', ['user' => $user])}}">Show<i
                        class="far fa-eye ml-2"></i></a>
            </div>
        </div>
    </x-slot>

    <div class="flex justify-center">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            <form method="post" action="{{ route('user.update', ['user' => $user]) }}">
                @method('PUT')
            @csrf

                <!-- First Name -->
                <x-form-input :name="'first_name'" :text="'First Name'" :value="old('first_name') ?? $user->first_name"></x-form-input>

                <!-- Last Name -->
                <x-form-input :name="'last_name'" :text="'Last Name'" :value="old('last_name') ?? $user->last_name"></x-form-input>

                <!-- Email Address -->
                <x-form-input :name="'email'" :text="'Email'" :type="'email'" :value="old('email') ?? $user->email"></x-form-input>

                <!-- Password -->
                <x-form-input :name="'password'" :text="'Password'" :type="'password'" :value="old('password')"></x-form-input>

                @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
                    <!-- Is admin -->
                    <x-form-checkbox :name="'is_admin'" :text="'Admin'" :checked="old('is_admin') ?? ( $user->is_admin ? 'on' : '')"></x-form-checkbox>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Save') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
