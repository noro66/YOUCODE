@extends('base')
@section('title', 'Create Trips')
@section('content')
{{--    <x-nav-bar />--}}

    @section('rout')
    {{route("trip.store")}}
    @endsection
    @section('type')
    @method('post')
    @endsection
    <div class="container my-20 mx-auto">
    <x-trip-form />
    </div>

@endsection
