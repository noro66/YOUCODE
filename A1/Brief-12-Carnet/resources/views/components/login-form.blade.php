<form action="@yield('login_route')" method="POST" class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">

    @csrf

    <!-- Email -->
    <div class="mb-4">
        <label for="email" class="block text-sm font-semibold text-gray-600">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email')}}" class="mt-1 p-2 w-full border rounded-md">
        @error('email') <span class="text-red-500">{{$message}}</span>@enderror
    </div>

    <!-- Password -->
    <div class="mb-4">
        <label for="password" class="block text-sm font-semibold text-gray-600">Password:</label>
        <input type="password" id="password" name="password" class="mt-1 p-2 w-full border rounded-md">
        @error('password') <span class="text-red-500">{{$message}}</span>@enderror
    </div>

    <div class="mt-4">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Login</button>
    </div>
</form>
