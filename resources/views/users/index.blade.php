<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Panel') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can('create', \App\Models\User::class)
                <div class="flex justify-end mb-2 mr-4">
                    <a class="items-center" href="{{ route('user.create')}}">Add user<i class="fas fa-user-plus ml-2"></i></a>
                </div>
            @endcan
            <div class="px-6 pt-6 pb-3 bg-white md:overflow-x-auto shadow-sm sm:rounded-lg mb-4">
                @if( $users->total() > 0 )
                    <div class="hidden col-span-8 border-b border-gray-200 md:grid md:grid-cols-8">
                        <div class="text-xl font-medium col-span-2">Name</div>
                        <div class="text-xl font-medium col-span-2">Surname</div>
                        <div class="text-xl font-medium col-span-3">Email</div>
                    </div>
                    <div class="divide-y-2 divide-gray-200 bg-white md:grid md:grid-cols-8">
                        @foreach( $users as $user )
                            @can('view', $user)
                                <div class="md:col-span-8 border-gray-200 md:grid md:grid-cols-8 py-2 md:py-1">
                                    <div class="md:flex inline-flex items-center md:col-span-2">
                                        {{ $user->first_name }}
                                    </div>
                                    <div class="md:flex inline-flex items-center md:col-span-2">
                                        {{ $user->last_name }}
                                    </div>
                                    <div class="flex items-center md:col-span-3">
                                        {{ $user->email }}
                                    </div>
                                    <div
                                        class="float-right -top-9 relative md:top-0 md:float-none md:col-span-1 flex space-x-1 justify-end">
                                        <a href="{{ route('user.show', ['user' => $user]) }}">
                                            <i class="far fa-eye fa-1.5x"></i>
                                        </a>

                                        @can('update', $user)
                                            <a href="{{ route('user.edit', ['user' => $user]) }}">
                                                <i class="far fa-edit fa-1.5x"></i>
                                            </a>
                                        @endcan
                                    </div>
                                </div>
                            @endcan
                        @endforeach
                    </div>
                @else
                    <div class="w-full">
                        No users yet
                    </div>
                @endif
            </div>
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>
