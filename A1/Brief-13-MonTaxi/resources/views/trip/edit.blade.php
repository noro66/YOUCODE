@extends('base')
@section('title', 'Create Trips')
@section('content')
{{--    <x-nav-bar />--}}
    @section('rout')
    {{route("trip.update", $trip->id)}}
    @endsection
    @section('type')
    @method('put')
    @endsection
    <div class="container my-20 mx-auto">
    <x-trip-form :trip="$trip" :drivers="$drivers" />
    </div>

@endsection
