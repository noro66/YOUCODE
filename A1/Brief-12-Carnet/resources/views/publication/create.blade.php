@extends('components.app')
@section('title')
    Create Publication
@endsection
@section('content')
    <h2 class="text-2xl font-bold mb-4">Publication Information</h2>
    <a href="{{url('recets')}}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Back</a>

    @if(session('success'))
        <x-alert type="green">
            <strong>{{session('success')}}</strong>
        </x-alert>
    @endif
    @section('rout')
        {{route("publication.store")}}
    @endsection
    @section('type')
        @method('post')
    @endsection
    <x-publication-form/>
@endsection
