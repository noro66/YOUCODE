@extends('layouts.app-normal')
@section('title', 'Category')
@section('content')

    <div class="container m-auto p-4 bg-gray-100">

{{--            <form action="{{ route('category.search') }}" method="GET" class="flex items-center justify-center">--}}
{{--                @csrf--}}
{{--                <label>--}}
{{--                    <input type="text" name="query" placeholder="Search Category" class="px-4 py-2 border-2 border-gray-200 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">--}}
{{--                </label>--}}
{{--                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-r-md">Search</button>--}}
{{--            </form>--}}
{{--        </div>--}}

    <div class="flex flex-col justify-center w-4/12 m-auto">
        <a  href="{{route('category.create')}}">
        <div class="mb-4 hover:bg-slate-900  border text-white rounded text-center block w-4/12 cursor-pointer  bg-blue-950 py-2 px-1.5 ">
            Create Category
        </div>
        </a>

        @if($categories->count())
        @foreach($categories as $category)
            <div class=" p-4 border  w-100 rounded-lg overflow-hidden shadow-lg">
                <div class="flex flex-col p-2  rounded">

                    <h3 class="text-xl font-semibold mb-2"><span class="font-medium">Category Name :</span>  <span class="underline">{{ $category->name }}</span></h3>
                <div class="p-6 flex items-center justify-between">
                    <form action="{{route('category.destroy', $category->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-4 rounded">Delete Category</button>
                    </form>
                    <div>
                    <a href="{{route('category.edit', $category->id)}}" class="bg-gray-900 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Update Category</a>
                    </div>

                </div>
                </div>
            </div>
        @endforeach
        @else
            <h3 class="bg-gray-100 text-3xl rounded-full text-center p-2">There is no Category</h3>
        @endif

    </div>
        </div>


@endsection
