<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between mb-2 mr-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ Auth::id() === $user->id ? __('Your profile')  :  __('Profile of ') . $user->first_name . ' ' . $user->last_name }}
            </h2>
            @can('update', $user)
                <div>
                    <a class="items-center" href="{{ route('user.edit', ['user' => $user])}}">Edit<i
                            class="far fa-edit ml-2"></i></a>
                </div>
            @endcan
        </div>
    </x-slot>

    <div class="flex justify-center">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <div>

                <!-- First Name -->
                <x-form-input
                             disabled
                             :name="'first_name'"
                             :text="'First Name'"
                             :value="$user->first_name"></x-form-input>

                <!-- Last Name -->
                <x-form-input
                             disabled
                             :name="'last_name'"
                             :text="'Last Name'"
                             :value="$user->last_name"></x-form-input>

                <!-- Email Address -->
                <x-form-input
                             disabled
                             :name="'email'"
                             :text="'Email'"
                             :type="'email'"
                             :value="$user->email"></x-form-input>

                @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
                    <!-- Is admin -->
                        <x-form-checkbox disabled :name="'is_admin'" :text="'Admin'" :checked="$user->is_admin ? 'on' : ''"></x-form-checkbox>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
