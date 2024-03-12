@extends('layouts.admin-dashboard')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">User Management</h1>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 border border-gray-300">Name</th>
                    <th class="px-4 py-2 border border-gray-300">Email</th>
                    <th class="px-4 py-2 border border-gray-300">Type</th>
                    <th class="px-4 py-2 border border-gray-300">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2 border border-gray-300">{{ $user->name }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $user->email }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $user->type }}</td>
                        <td class="px-4 py-2 border border-gray-300">
                            <form action="{{ route('user.restrict', $user->id) }}" method="post">
                                @csrf
                            <button type="submit" class="{{$user->is_restricted ? 'bg-green-500 hover:bg-green-700' : 'bg-red-500 hover:bg-red-700'}} text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">Restrict</button>
                            </form>
{{--                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">Direct</button>--}}
{{--                            <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Limit Access</button>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
