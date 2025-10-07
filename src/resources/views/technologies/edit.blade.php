{{-- resources/views/projects/edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Edit Project
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        @include('projects._form', [
            'route' => route('projects.update', $project),
            'method' => 'PUT',
            'project' => $project,
            'buttonText' => 'Update'
        ])
    </div>
</x-app-layout>

