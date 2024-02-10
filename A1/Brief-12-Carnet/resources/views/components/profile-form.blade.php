@props(['profile'])

<form action="@yield('rout')"  method="POST" enctype="multipart/form-data"  class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">

    @csrf
    @yield('type')
    <!-- Name -->
    <div class="mb-4">
        <label for="name" class="block text-sm font-semibold text-gray-600">Name:</label>
        <input type="text" id="name" name="name" value="{{ $profile->name ?? old('name')}}" class="mt-1 p-2 w-full border rounded-md">
        @error('name') <span class="text-red-500">{{$message}}</span>@enderror
    </div>

    <!-- Email -->
    <div class="mb-4">
        <label for="email" class="block text-sm font-semibold text-gray-600">Email:</label>
        <input type="email" id="email" name="email" value="{{ $profile->email ?? old('email')}}" class="mt-1 p-2 w-full border rounded-md">
        @error('email') <span class="text-red-500">{{$message}}</span>@enderror
    </div>

    <!-- Password -->
    <div class="mb-4">
        <label for="password" class="block text-sm font-semibold text-gray-600">Password:</label>
        <input type="password" id="password" name="password" class="mt-1 p-2 w-full border rounded-md">
        @error('password') <span class="text-red-500">{{$message}}</span>@enderror
    </div>

    {{-- Password confirmation--}}

    <div class="mb-4">
        <label for="password" class="block text-sm font-semibold text-gray-600">Password confirmation:</label>
        <input type="password" id="password" name="password_confirmation" class="mt-1 p-2 w-full border rounded-md">
        @error('password_confirmation') <span class="text-red-500">{{$message}}</span>@enderror
    </div>

    <!-- Bio -->
    <div class="mb-4">
        <label for="bio" class="block text-sm font-semibold text-gray-600">Bio:</label>
        <textarea id="bio" name="bio" rows="4" class="mt-1 p-2 w-full border rounded-md">{{ $profile->bio ?? old('bio')}}</textarea>
        @error('bio') <span class="text-red-500">{{$message}}</span>@enderror
    </div>

    <!-- Image -->
    <div class="mb-4">
        <label for="image" class="block text-sm font-semibold text-gray-600">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" class="mt-1 p-2 w-full border rounded-md">
        @error('image') <span class="text-red-500">{{$message}}</span>@enderror
    </div>

    <div class="mt-4">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Submit</button>
    </div>
</form>
