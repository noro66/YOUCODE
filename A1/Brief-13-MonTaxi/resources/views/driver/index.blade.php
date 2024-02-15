@extends('base')
@section('title', 'Drivers')
@section('content')
<x-nav-bar />
<div class="flex justify-around items-center">
<h2 class="font-bold text-4xl" >Drivers List :    </h2>
<a href="{{route('driver.create')}}"  class=" px-6 py-2 rounded-full bg-orange-700 hover:bg-slate-900">Create A Driver</a>
</div>
<div class="flex flex-col items-center md:flex-row ">
    @forelse($drivers as $driver)
    <x-driver-card :driver="$driver" />
    @empty
        <h2 class="font-bold text-3xl text-center  my-40">There Is No Drivers</h2>
    @endforelse
    {{$drivers->links()}}
</div>
@endsection
