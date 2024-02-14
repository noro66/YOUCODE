@extends('base')
@section('title', 'Update Trip')
@section('content')
{{--    <x-nav-bar />--}}
    @section('rout')
    {{route("trip.update", $trip->id)}}
    @endsection
    @section('type')
    @method('PUT')
    @endsection
    <div class="container my-20 mx-auto">
    <x-trip-form :trip="$trip" />
    </div>

@endsection
