@extends('layouts.admin-dashboard')

@section('content')

    <div class="flex flex-wrap justify-around gap-y-4 gap-x-1 p-10">
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 bg-gray-300 text-gray-800 p-4 border-2 border-gray-800 text-center">
            <span class="text-3xl font-semibold">{{ $users_count }}</span>
            <h1 class="text-xl font-semibold">Active Users</h1>
        </div>
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 bg-gray-300 text-gray-800 p-4 border-2 border-gray-800 text-center">
            <span class="text-3xl font-semibold">{{ $restrictedUsers_count }}</span>
            <h1 class="text-xl font-semibold">Restricted Users</h1>
        </div>
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 bg-gray-300 text-gray-800 p-4 border-2 border-gray-800 text-center">
            <span class="text-3xl font-semibold">{{ $event }}</span>
            <h1 class="text-xl font-semibold">Total Events</h1>
        </div>
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 bg-gray-300 text-gray-800 p-4 border-2 border-gray-800 text-center">
            <span class="text-3xl font-semibold">{{ $ctg }}</span>
            <h1 class="text-xl font-semibold">Total Categories</h1>
        </div>
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 bg-gray-300 text-gray-800 p-4 border-2 border-gray-800 text-center">
            <span class="text-3xl font-semibold">{{ $approved_events_count }}</span>
            <h1 class="text-xl font-semibold">Approved Events</h1>
        </div>
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 bg-gray-300 text-gray-800 p-4 border-2 border-gray-800 text-center">
            <span class="text-3xl font-semibold">{{ $pending_events_count }}</span>
            <h1 class="text-xl font-semibold">Pending Events</h1>
        </div>
    </div>
@endsection
