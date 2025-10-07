{{-- resources/views/companies/edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Edit company
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        @include('companies._form', [
            'route' => route('companies.update', $company),
            'method' => 'PUT',
            'company' => $company,
            'buttonText' => 'Update company'
        ])
    </div>
</x-app-layout>

