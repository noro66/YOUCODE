@extends('base')
@section('title', 'Trips')
@section('content')
<x-nav-bar />
<div class="flex justify-around items-center">
<h2 class="font-bold text-4xl" >Trips List :    </h2>
<a href="{{route('trip.create')}}"  class=" px-6 py-2 rounded-full bg-orange-700 hover:bg-slate-900">Create A Trip</a>
</div>
<div class="flex flex-col items-center md:flex-row ">
    @forelse($trips as $trip)
    <x-trip-card :trip="$trip" />
    @empty
        <h2 class="font-bold text-3xl text-center  my-40">There Is No Trips</h2>
    @endforelse
    {{$trips->links()}}
</div>
@endsection
