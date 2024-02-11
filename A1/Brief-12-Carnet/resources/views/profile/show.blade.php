@extends('components.app')
@section('title')
    show Profile
@endsection

@section('content')
    <div>{{dd($profile->publication)}}</div>
    <h2 class="text-2xl font-bold mb-4">Profile Name : {{$profile->name}}</h2>
    <div class="flex justify-center align-center w-full">
        <!-- Sample Profile Card-->
        <div class="bg-white w-sm p-4 rounded-md shadow-md">
            <img class="w-full h-64" src="{{ asset('storage/'. $profile->image) }}"
                 alt="receipt image">
            <h3 class="text-lg font-semibold mb-2">Receit {{$profile->id}}</h3>
            <p class="text-gray-600 mb-2">{{$profile->name}}</p>
            <p class="text-gray-600 mb-2">{{$profile->email}}</p>
            <p class="text-gray-600 mb-2">{{$profile->bio}}</p>
            <a href="{{route('recets.edit', $profile->id )}}"
               class="px-4  m-3 py-2 bg-blue-500 text-white rounded-md hover:bg-green-600">Update </a>
            <a href="{{url('recets/delete/'. $profile->id )}}" onclick="return confirm('Are you sure ?')"
               class="px-4 py-2 m-3 bg-blue-500 text-white rounded-md hover:bg-red-600">Delete </a>
        </div><!-- Repeat the above card structure for each recei   pt -->
    </div>

@endsection
