{{-- resources/views/technologies/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Add technology
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        @include('technologies._form', [
        'route' => route('technologies.store'),
        'method' => 'POST',
        'buttonText' => 'Add technology',
        'technology' => new \App\Models\Technology(),
         ])
    </div>
</x-app-layout>

