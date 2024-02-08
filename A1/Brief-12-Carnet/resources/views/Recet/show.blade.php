@extends('layout.app')
@section('title') show Receipt @endsection

@section('content')
<h2 class="text-2xl font-bold mb-4">Receipt Name : {{$receipt->name}}</h2>
<div class="flex justify-center align-center w-full">
    <!-- Sample Receipt Card-->
        <div class="bg-white w-sm p-4 rounded-md shadow-md">
            <img class="w-full h-64" src="{{ asset('/storage/' . ltrim($receipt->image, 'public/')) }}" alt="receipt image">
            <h3 class="text-lg font-semibold mb-2">Receit {{$receipt->id}}</h3>
            <p class="text-gray-600 mb-2">{{$receipt->name}}</p>
            <p class="text-gray-600 mb-2">{{$receipt->description}}</p>
            <a href="{{url('recets/edit/'. $receipt->id )}}" class="px-4  m-3 py-2 bg-blue-500 text-white rounded-md hover:bg-green-600">Update </a>
            <a href="{{url('recets/delete/'. $receipt->id )}}" onclick="return confirm('Are you sure ?')"  class="px-4 py-2 m-3 bg-blue-500 text-white rounded-md hover:bg-red-600">Delete </a>
        </div><!-- Repeat the above card structure for each recei   pt -->
</div>
@endsection