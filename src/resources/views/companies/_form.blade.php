{{-- resources/views/companies/_form.blade.php --}}
<form action="{{ $route }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @if (isset($method) && $method !== 'POST')
        @method($method)
    @endif

    <div>
        <label for="name" class="block font-semibold mb-1">Company name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $company->name ?? '') }}"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="website" class="block font-semibold mb-1">Company website</label>
        <textarea name="website" id="website" cols="70" rows="1" 
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
        </textarea>
    </div>

    <!-- logo Upload -->
    <div>
        <label for="logo" class="block font-semibold mb-1">Company logo</label>
        <input type="file" name="logo" id="logo" accept="logo/*"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
    </div> 

    <div>
        <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">
            {{ $buttonText }}
        </button>
    </div>
</form>








