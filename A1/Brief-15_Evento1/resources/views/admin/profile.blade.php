@extends('layouts.organizer-dashboard  ')

@section('content')
    <div class="container mx-auto px-4">
        <div class="max-w-md mx-auto mt-8">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="text-xl font-semibold mb-6">{{ __('Edit Profile') }}</div>
                <img width="220px" class="mx-auto mb-6" src="{{ asset('storage/'. $user->profile_image) }}" alt="Profile Image">
                @if (session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                        <p class="font-bold">{{ session('success') }}</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <input id="name" type="text" class="form-input @error('name') border-red-500 @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                        @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold mb-2">{{ __('Email') }}</label>
                        <input id="email" type="email" class="form-input @error('email') border-red-500 @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

                        @error('email')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="profile_image" class="block text-gray-700 font-bold mb-2">{{ __('Profile Image') }}</label>
                        <input id="profile_image" type="file" class="form-input @error('profile_image') border-red-500 @enderror" name="profile_image">

                        @error('profile_image')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-center justify-center mt-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('Update Profile') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
