@extends('layout.app')
@section('title') Edit Receipt @endsection

@section('content')
<h2 class="text-2xl font-bold mb-4">Receipt Information</h2>
<a href="{{route('recets.index')}}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Back</a>
@section('rout') route('recets.edit', $recet->id)    @endsection
{{--@dd($recet)--}}
<x-recets-post :recet="$recet" />
@endsection
