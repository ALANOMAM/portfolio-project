{{-- resources/views/projects/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Create Project
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{-- @include('projects._form', ['route' => route('projects.store'), 'method' => 'POST', 'buttonText' => 'Create']) --}}
        @include('projects._form', [
        'route' => route('projects.store'),
        'method' => 'POST',
        'buttonText' => 'Create',
        'project' => new \App\Models\Project(),
         ])

    </div>
</x-app-layout>

