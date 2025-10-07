{{-- resources/views/companies/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ $company->name }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <p class="mb-6 text-gray-700">{{ $company->logo }}</p>
        <p class="mb-6 text-gray-700">{{ $company->website }}</p>
        <a href="{{ route('companies.index') }}" class="text-blue-600 hover:underline">← Back to list</a>
    </div>
</x-app-layout>


