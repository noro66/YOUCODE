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

@if(session('success'))
    <div class="bg-green-300 w-30 ">{{session('success')}}</div>
@endif
<!-- Search Input -->
<div class="mb-4">
    <label for="search" class="block text-sm font-semibold text-gray-600">Search:</label>
    <input type="text" id="search" name="search" class="mt-1 p-2 w-full border rounded-md" placeholder="Search receipts...">
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    <!-- Sample Receipt Card (Repeat this for each receipt) -->
    <div class="bg-white p-4 rounded-md shadow-md">
        <h3 class="text-lg font-semibold mb-2">Receipt 1</h3>
        <p class="text-gray-600 mb-2">Name: John Doe</p>
        <p class="text-gray-600 mb-2">Description: Lorem ipsum dolor sit amet.</p>
        <!-- You can add an image here if needed -->
        <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-green-600">Update Details</button>
        <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-red-600">Delete Details</button>
    </div>

    <!-- Repeat the above card structure for each receipt -->
</div>

<!-- Button to Add Receipt -->
<div class="mt-4">
    <a href="{{ url('recets/create') }}" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Add Receipt</a>
</div>

</body>
</html>
