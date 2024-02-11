@extends('components.app')
@section('title')
    Edit Publication
@endsection

@section('content')
    <h2 class="text-2xl font-bold mb-4">Publication Information</h2>
    <a href="{{url('publication.index')}}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Back</a>

    @if(session('success'))
        <x-alert type="green">
            <strong>{{session('success')}}</strong>
        </x-alert>
    @endif
    @section('rout')
        {{route("publication.update", 1)}}
    @endsection
    @section('type')
        @method('put')
    @endsection
    <x-publication-form :publication="$publication"/>
@endsection
