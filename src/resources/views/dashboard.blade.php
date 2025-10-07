<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    <a href="{{ route('projects.index') }}" class="btn btn-primary">Go to projects</a>  
                    <a href="{{ route('companies.index') }}" class="btn btn-primary">Go to companies</a>  
                    <a href="{{ route('technologies.index') }}" class="btn btn-primary">Go to technologies</a>  
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
