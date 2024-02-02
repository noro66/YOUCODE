<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipts Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 p-8">

<h2 class="text-2xl font-bold mb-4">Receipts</h2>

<!-- Search Input -->
<form action="{{ url('recets/search') }}" method="get" class="max-w-xl mx-auto p-6 bg-white border rounded-md shadow-md">
    <div class="mb-4">
        <label for="search" class="block text-sm font-semibold text-gray-600">Search:</label>
        <input type="text" id="search" name="search" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" placeholder="Search receipts...">
    </div>
    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">Search</button>
</form>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    <!-- Sample Receipt Card (Repeat this for each receipt) -->
    @foreach($receipts as $receipt)
    <div class="bg-white p-4 rounded-md shadow-md">
        <img class="min-h-12 min-w-15" src="{{ asset('/storage/' . ltrim($receipt->image, 'public/')) }}" alt="receipt image">
        <h3 class="text-lg font-semibold mb-2">Receit {{$receipt->id}}</h3>
        <p class="text-gray-600 mb-2">{{$receipt->name}}</p>
        <p class="text-gray-600 mb-2">{{$receipt->description}}</p>
        <a href="{{url('recets/edit/'. $receipt->id )}}" class="px-4  m-3 py-2 bg-blue-500 text-white rounded-md hover:bg-green-600">Update </a>
        <a href="{{url('recets/delete/'. $receipt->id )}}" onclick="return confirm('Are you sure ?')"  class="px-4 py-2 m-3 bg-blue-500 text-white rounded-md hover:bg-red-600">Delete </a>
    </div>
    @endforeach
    <!-- Repeat the above card structure for each receipt -->
</div>
<!-- Button to Add Receipt -->
<div class="mt-4">
    <a href="{{ url('recets/create') }}" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Add Receipt</a>
</div>

</body>
</html>