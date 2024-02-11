@props(['publication'])

<form action="@yield('rout')"  method="POST" enctype="multipart/form-data"  class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">

    @csrf
    @yield('type')
    <!-- title -->
    <div class="mb-4">
        <label for="title" class="block text-sm font-semibold text-gray-600">title:</label>
        <input type="text" id="title" name="title" value="{{  old('title', $publication->title ?? '') }}" class="mt-1 p-2 w-full border rounded-md">
        @error('title') <span class="text-red-500">{{$message}}</span>@enderror
    </div>
    <!-- Body -->
    <div class="mb-4">
        <label for="body" class="block text-sm font-semibold text-gray-600">Description:</label>
        <textarea id="body" name="body" rows="4" class="mt-1 p-2 w-full border rounded-md">{{  old('body', $publication->body ?? ' ')}}</textarea>
        @error('body') <span class="text-red-500">{{$message}}</span>@enderror
    </div>

    <!-- Image -->
    <div class="mb-4">
        <label for="image" class="block text-sm font-semibold text-gray-600">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" class="mt-1 p-2 w-full border rounded-md">
        @error('image') <span class="text-red-500">{{$message}}</span>@enderror
    </div>

    <div class="mt-4">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Submit</button>
    </div>
</form>
