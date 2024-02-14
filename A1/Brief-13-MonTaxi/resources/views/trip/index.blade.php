@extends('base')
@section('title', 'Trips')
@section('content')
<x-nav-bar />
    @forelse($trips as $trip)
    <x-trip-card :trip="$trip" />
    @empty
        <h2 class="font-bold text-3xl text-center  my-40">There Is No Trips</h2>
    @endforelse
@endsection
