{{-- resources/views/projects/_form.blade.php --}}
<form action="{{ $route }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @if (isset($method) && $method !== 'POST')
        @method($method)
    @endif

    <div>
        <label for="title" class="block font-semibold mb-1">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $project->title ?? '') }}"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
        @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- @dump($categories) --}}
    <div>
        <label for="category_id" class="block font-semibold mb-1">Category</label>
        <select name="category_id" id="category_id" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
          <option value="">Select category</option>  
          @foreach ($categories as $category)
           <option value="{{$category->id}}"
            @selected(old('category_id', $project->category_id ?? '') == $category->id)>
            {{$category->name}}
           </option>  
          @endforeach
        </select>
    </div>


    <div class="mb-3">
    <label class="form-label font-semibold">Select Technologies</label>
    <div class="row">
        @foreach($technologies as $technology)
            <div class="col-md-4">
                <div class="form-check">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="technologies[]"
                        value="{{ $technology->id }}"
                        id="tech{{ $technology->id }}"
                        @checked(
                            in_array($technology->id, old('technologies', $project->technologies->pluck('id')->toArray() ?? []))
                        )
                    >
                    <label class="form-check-label" for="tech{{ $technology->id }}">
                        {{ $technology->name }}
                    </label>
                </div>
            </div>
        @endforeach
        </div>
    </div>


    <div>
        <label for="description" class="block font-semibold mb-1">Description</label>
        <textarea name="description" id="description" rows="5"
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ old('description', $project->description ?? '') }}</textarea>
        @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="project_link" class="block font-semibold mb-1">Project link</label>
        <textarea name="project_link" id="project_link" cols="70" rows="1" 
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
        </textarea>
    </div>

    <!-- Image Upload -->
    <div>
        <label for="image" class="block font-semibold mb-1">Project image</label>
        <input type="file" name="image" id="image" accept="image/*"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
    </div> 

    <!-- Video Upload -->
    <div>
        <label for="video" class="block font-semibold mb-1">Project video</label>
        <input type="file" name="video" id="video" accept="video/*"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
    </div>

    <div>
        <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">
            {{ $buttonText }}
        </button>
    </div>
</form>








