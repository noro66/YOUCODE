@props(['driver'])

<a href="{{ route('driver.index') }}" class=" px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Back</a>

<form action="@yield('rout')" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
    @csrf
    @yield('type')
    <!-- Name -->
    <div class="mb-4">
        <label for="name" class="block text-sm font-semibold text-gray-600">Name :</label>
        <input type="text" id="name" name="name" value="{{ old('name', $driver->name ?? '') }}" class="mt-1 p-2 w-full border rounded-md">
        @error('name') <span class="text-red-500">{{$message}}</span>@enderror
    </div>
    <!-- Description -->
    <div class="mb-4">
        <label for="description" class="block text-sm font-semibold text-gray-600">Description :</label>
        <textarea id="description" name="description" rows="4" class="mt-1 p-2 w-full border rounded-md">{{ old('description', $driver->description ?? '') }}</textarea>
        @error('description') <span class="text-red-500">{{$message}}</span>@enderror
    </div>
    <!-- Avatar -->
    <div class="mb-4">
        <label for="avatar" class="block text-sm font-semibold text-gray-600">Avatar :</label>
        @if(isset($driver->avatar))
            <img src="{{ asset('storage/' . $driver->avatar) }}" class="w-20" alt="">
        @endif
        <input type="file" id="avatar" name="avatar" accept="image/*" class="mt-1 p-2 w-full border rounded-md">
        @error('avatar') <span class="text-red-500">{{$message}}</span>@enderror
    </div>
    <!-- Phone -->
    <div class="mb-4">
        <label for="phone" class="block text-sm font-semibold text-gray-600">Phone :</label>
        <input type="text" id="phone" name="phone" value="{{ old('phone', $driver->phone ?? '') }}" class="mt-1 p-2 w-full border rounded-md">
        @error('phone') <span class="text-red-500">{{$message}}</span>@enderror
    </div>
    <!-- Matriculate -->
    <div class="mb-4">
        <label for="matriculate" class="block text-sm font-semibold text-gray-600">Matriculate :</label>
        <input type="text" id="matriculate" name="matriculate" value="{{ old('matriculate', $driver->matriculate ?? '') }}" class="mt-1 p-2 w-full border rounded-md">
        @error('matriculate') <span class="text-red-500">{{$message}}</span>@enderror
    </div>
    <!-- Vehicle Type -->
    <div class="mb-4">
        <label for="v_type" class="block text-sm font-semibold text-gray-600">Vehicle Type :</label>
        <input type="text" id="v_type" name="v_type" value="{{ old('v_type', $driver->v_type ?? '') }}" class="mt-1 p-2 w-full border rounded-md">
        @error('v_type') <span class="text-red-500">{{$message}}</span>@enderror
    </div>
    <div class="mt-4">
        <button type="submit" class="px-4 py-2 bg-orange-700 text-white rounded-md hover:bg-orange-600">Submit</button>
    </div>
</form>
