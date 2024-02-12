@extends('components.app')
@section('title')
    Edit Profile
@endsection
@section('content')
    <h2 class="text-2xl font-bold mb-4">Profle Information</h2>
    <a href="{{url('recets')}}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Back</a>

    @if(session('success'))
        <x-alert type="green">
            <strong>{{session('success')}}</strong>
        </x-alert>
    @endif
    @section('rout')
        {{route("profile.update", $profile->id)}}
    @endsection
    @section('type')
        @method('PATCH')
    @endsection
    <x-profile-form :profile="$profile"/>
@endsection
