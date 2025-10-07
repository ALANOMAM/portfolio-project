
{{-- resources/views/projects/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Projects
        </h2>
    </x-slot>

    {{-- @dump($projects) --}}

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="flex justify-between mb-4">
            <a href="{{ route('projects.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">New Project</a>
        </div>

        @if (session('success'))
            <div class="mb-4 text-green-700 bg-green-100 border border-green-400 rounded px-4 py-2">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-sm rounded p-4">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="text-left py-2">Title</th>
                        <th class="text-center py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr class="border-t">
                            <td class="py-2">
                                {{ $project->title }}
                                <ul class="text-sm text-gray-600">
                                    @foreach ($project->technologies as $tech)
                                        <li>- {{ $tech->name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="py-2 text-center">
                                <a href="{{ route('projects.show', $project) }}" class="text-blue-600 hover:underline">View</a> |
                                <a href="{{ route('projects.edit', $project) }}" class="text-yellow-500 hover:underline">Edit</a> |
                                <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this project?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

