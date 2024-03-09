@extends('layouts.app')

@section('content')
    @section('title') Dashboard @endsection
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        hello {{auth()->user()->name}}
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit">logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
