{{-- resources/views/companies/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ $company->name }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
               {{-- Show logo if it exists --}}
        @if ($company->logo)
            <div class="mb-4">
                <img src="{{ Storage::disk('minio')->url($company->logo) }}" alt="company logo" class="mt-2 max-w-xs rounded shadow">
            </div>
        @endif
        <p class="mb-6 text-gray-700">{{ $company->website }}</p>
        <a href="{{ route('companies.index') }}" class="text-blue-600 hover:underline">← Back to list</a>
    </div>
</x-app-layout>


