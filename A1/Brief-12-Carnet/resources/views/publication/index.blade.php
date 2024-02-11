@extends('components.app')
@section('title')
    Publications
@endsection

@section('content')
    <h1 class="text-2xl font-bold mb-4">Publications</h1>
    <div class="mt-4 mb-4">
        <a href="{{ route('publication.create') }}" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Add
            Publication</a>
    </div>

    <!-- Search Input -->
{{--    <form action="{{ route('publication.search') }}" method="get"--}}
{{--          class="max-w-xl mb-4 mx-auto p-6 bg-white border rounded-md shadow-md">--}}
{{--        @csrf--}}
{{--        <div class="mb-4">--}}
{{--            <label for="search" class="block text-sm font-semibold text-gray-600">Search:</label>--}}
{{--            <input type="text" id="search" name="search"--}}
{{--                   class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500"--}}
{{--                   placeholder="Search receipts...">--}}
{{--        </div>--}}
{{--        <button type="submit"--}}
{{--                class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">--}}
{{--            Search--}}
{{--        </button>--}}
{{--    </form>--}}

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <!-- Sample Receipt Card (Repeat this for each receipt) -->
        @foreach($publications as $publication)
           <x-publication :publication="$publication" />
        @endforeach
        <!-- Repeat the above card structure for each receipt -->
    </div>
    <div class="my-3">
{{--        {{ $publication->links() }}--}}
    </div>
    <!-- Button to Add Receipt -->
@endsection
