{{-- resources/views/projects/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ $project->title }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{-- Show Image if it exists --}}
        @if ($project->image)
            <div class="mb-4">
                <img src="{{ Storage::disk('minio')->url($project->image) }}" alt="Project Image" class="mt-2 max-w-xs rounded shadow">
            </div>
        @endif

        {{-- Show Video if it exists --}}
        @if ($project->video)
            <div class="mb-6">
                <video controls class="w-full max-w-lg rounded shadow">
                    <source src="{{ Storage::disk('minio')->url($project->video) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        @endif

        {{-- Project description --}}
        <p class="mb-6 text-gray-700">{{ $project->description }}</p>

        {{-- Back to list link --}}
        <a href="{{ route('projects.index') }}" class="text-blue-600 hover:underline">← Back to list</a>
    </div>
</x-app-layout>


