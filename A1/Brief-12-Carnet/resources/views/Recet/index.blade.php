@extends('components.app')
@section('title')
    Receipts
@endsection

@section('content')
    <h1>hellos kdlfj </h1>
    <h2 class="text-2xl font-bold mb-4">Receipts</h2>
    <div class="mt-4 mb-4">
        <a href="{{ route('recets.create') }}" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Add
            Receipt</a>
    </div>

    <!-- Search Input -->
    <form action="{{ route('recets.search') }}" method="get"
          class="max-w-xl mb-4 mx-auto p-6 bg-white border rounded-md shadow-md">
        @csrf
        <div class="mb-4">
            <label for="search" class="block text-sm font-semibold text-gray-600">Search:</label>
            <input type="text" id="search" name="search"
                   class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500"
                   placeholder="Search receipts...">
        </div>
        <button type="submit"
                class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">
            Search
        </button>
    </form>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <!-- Sample Receipt Card (Repeat this for each receipt) -->
        @foreach($receipts as $receipt)
            <div class="bg-white p-4 rounded-md shadow-md">
                <img class="w-full h-64" src="{{ asset('storage/' . $receipt->image ) }}"
                     alt="receipt image">
                <h3 class="text-l font-semibold mb-2">Receit {{$receipt->id}}</h3>
                <p class="text-black-600 mb-2 text-xl ">{{$receipt->name}}</p>
                <p class="text-gray-600 mb-2">{{$receipt->description}}</p>
                <a href="{{route('recets.edit', $receipt->id )}}"
                   class="px-4  m-3 py-2 bg-blue-500 text-white rounded-md hover:bg-green-600">Update </a>

                <form action="{{ route('recets.destroy', $receipt->id )}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure ?')"
                       class="px-4 py-2 m-3 bg-blue-500 text-white rounded-md hover:bg-red-600">Delete </button>
                </form>
            </div>
        @endforeach
        <!-- Repeat the above card structure for each receipt -->
    </div>
    <div class="my-3">
         {{ $receipts->links() }}
    </div>
    <!-- Button to Add Receipt -->
@endsection
