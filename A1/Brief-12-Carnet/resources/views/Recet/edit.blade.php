<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 p-8">

<h2 class="text-2xl font-bold mb-4">Receipt Information</h2>
<a href="{{url('recets')}}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Back</a>

@if(session('success'))
    <div class="bg-green-300 m-4 p-3 ">{{session('success')}}</div>
@endif
<form action= "{{url('recets/edit/'. $recet->id )}}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">

    @csrf
    @method('PUT')
    <!-- Name -->
    <div class="mb-4">
        <label for="name" class="block text-sm font-semibold text-gray-600">Name:</label>
        <input type="text" id="name" name="name" value="{{$recet->name}}" class="mt-1 p-2 w-full border rounded-md">
        @error('name') <span class="text-red-500">{{$message}}</span>@enderror
    </div>

    <!-- Description -->
    <div class="mb-4">
        <label for="description" class="block text-sm font-semibold text-gray-600">Description:</label>
        <textarea id="description" name="description" rows="4"  class="mt-1 p-2 w-full border rounded-md">{{$recet->description}}</textarea>
        @error('description') <span class="text-red-500">{{$message}}</span>@enderror
    </div>

    <!-- Image -->
    <div class="mb-4">
        <label for="image" class="block text-sm font-semibold text-gray-600">Image:</label>
        <input type="file" id="image" name="image" accept="image/*"  class="mt-1 p-2 w-full border rounded-md">
        @error('image ') <span class="text-red-500">{{$message}}</span>@enderror

    </div>

    <div class="mt-4">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Update</button>
    </div>
</form>

</body>
</html>
