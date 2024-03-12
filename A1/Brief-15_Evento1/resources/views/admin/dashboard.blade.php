@extends('layouts.admin-dashboard ')

@section('content')

    <div class="flex w-[100%] justify-between flex-wrap gap-y-4" >
        <div class="w-[48%] bg-gray-300 text-gray-800 p-4 border-2 border-gray-800 text-center" >
            <span class="text-3xl font-[500]" >{{ $total_events }}</span>
            <h1 class="text-xl font-[600]" >Total Events</h1>
        </div>

        <div class="w-[48%] bg-gray-300 text-gray-800 p-4 border-2 border-gray-800 text-center" >
            <span class="text-3xl font-[500]" >{{ $not_trashed_events }}</span>
            <h1 class="text-xl font-[600]" >None Trashed Event</h1>
        </div>

        <div class="w-[48%] bg-gray-300 text-gray-800 p-4 border-2 border-gray-800 text-center" >
            <span class="text-3xl font-[500]" >{{ $trashed_events }}</span>
            <h1 class="text-xl font-[600]" > Trashed Events</h1>
        </div>

    </div>
@endsection
