@extends('base')
@section('title', 'Create Driver')
@section('content')
{{--    <x-nav-bar />--}}

    @section('rout')
    {{route("driver.store")}}
    @endsection
    @section('type')
    @method('put')
    @endsection
    <div class="container my-20 mx-auto">
    <x-driver-form  :driver="$driver" />
    </div>

@endsection
