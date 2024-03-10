@extends('layouts.admin-dashboard')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-lg font-semibold mb-1">Add Event</h2>
    </div>

    <!-- Form -->
    <form class="max-w-lg mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-1">
        <div class="mb-1">
            <input type="text" id="title" name="title" placeholder="Event Title" class="mt-1 p-2 block w-full border rounded-md focus:outline-none focus:border-indigo-300">
        </div>

        <div class="mb-1">
            <textarea id="description" name="description" placeholder="Event Description" rows="3" class="mt-1 p-2 block w-full border rounded-md focus:outline-none focus:border-indigo-300"></textarea>
        </div>

        <div class="mb-1">
            <input type="date" id="date" name="date" placeholder="Event Date" class="mt-1 p-2 block w-full border rounded-md focus:outline-none focus:border-indigo-300">
        </div>

        <div class="mb-1">
            <input type="time" id="time" name="time" placeholder="Event Time" class="mt-1 p-2 block w-full border rounded-md focus:outline-none focus:border-indigo-300">
        </div>

        <div class="mb-1">
            <input class="p-2 rounded w-full border border-gray-300" type="text" list="categoryList" name="category_id" id="category_id" placeholder="Search for a category">
            <datalist id="categoryList">
                @foreach($categories as $category)
                    <option value="{{$category->name}}">
                @endforeach
            </datalist>
        </div>

        <div class="mb-1">
            <input type="text" id="Address" placeholder="Event Address" name="Address" class="mt-1 p-2 block w-full border rounded-md focus:outline-none focus:border-indigo-300">
        </div>

        <div class="mb-1">
            <input type="file" id="poster_image" name="poster_image" class="mt-1 p-2 block w-full border rounded-md focus:outline-none focus:border-indigo-300">
        </div>

        <div class="mb-1">
            <input type="number" id="seats" placeholder="Event Seats" name="seats" class="mt-1 p-2 block w-full border rounded-md focus:outline-none focus:border-indigo-300">
        </div>

        <div class="mb-1">
            <select class="p-2 w-full border rounded-md focus:outline-none focus:border-indigo-300">
                <option selected>Select Confirmation Type</option>
                <option class="automatic">Automatic</option>
                <option class="manually">Manually</option>
            </select>
        </div>

        <button type="submit" class="bg-gray-900 w-full mt-1 text-white py-2 px-4 rounded hover:bg-gray-800 focus:outline-none focus:bg-gray-800">Submit</button>
    </form>
@endsection
