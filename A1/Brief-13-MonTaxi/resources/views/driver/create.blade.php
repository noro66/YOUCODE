@extends('base')
@section('title', 'Create Driver')
@section('content')
{{--    <x-nav-bar />--}}

    @section('rout')
    {{route("driver.store")}}
    @endsection
    @section('type')
    @method('post')
    @endsection
    <div class="container my-20 mx-auto">
    <x-driver-form />
    </div>

@endsection
