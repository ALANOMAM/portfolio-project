
{{-- resources/views/companies/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Companies
        </h2>
    </x-slot>

    {{-- @dump($companies) --}}

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="flex justify-between mb-4">
            <a href="{{ route('companies.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">New Company</a>
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
                        <th class="text-left py-2">Name</th>
                        <th class="text-center py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr class="border-t">
                            <td class="py-2">
                                {{ $company->name }}
                            </td>
                            <td class="py-2 text-center">
                                <a href="{{ route('companies.show', $company) }}" class="text-blue-600 hover:underline">View</a> |
                                <a href="{{ route('companies.edit', $company) }}" class="text-yellow-500 hover:underline">Edit</a> |
                                <form action="{{ route('companies.destroy', $company) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this company?')">
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

