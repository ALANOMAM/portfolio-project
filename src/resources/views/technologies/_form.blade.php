{{-- resources/views/technologies/_form.blade.php --}}
<form action="{{ $route }}" method="POST"  class="space-y-6">
    @csrf
    @if (isset($method) && $method !== 'POST')
        @method($method)
    @endif

    <div>
        <label for="name" class="block font-semibold mb-1">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $technology->name ?? '') }}"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">
            {{ $buttonText }}
        </button>
    </div>
</form>








