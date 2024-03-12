<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
<div>
    <main>
        <section class="flex justify-between h-screen">
            <div class="w-1/5 bg-gray-900 py-6 md:px-6">
                <ul>
                    <a class="cursor-pointer" href="{{route('home')}}">
                    <li class="flex items-center gap-x-4 mb-8">
                        <img src="{{ asset('storage/publicImages/logo.svg') }}" alt="Dashboard img" class="w-8">
                    </li>
                    <a/>
                    <a href="{{route('participant.profile')}}" class="ml-4 font-semibold text-lg text-white">
                        <li class="flex items-center gap-x-4 bg-gray-100/10 rounded py-2 px-6 hover:bg-gray-500">
                            <img src="{{ asset('storage/publicImages/profile.svg') }}" alt="Profile Img" class="w-10">
                            <span class="hidden md:inline">Profile</span>
                        </li>
                    </a>

                    <a href="{{route('booking.index')}}" class="ml-4 font-semibold text-lg text-white">
                        <li class="flex items-center gap-x-4 bg-gray-100/10 rounded py-2 px-6 hover:bg-gray-500">
                            <img src="{{ asset('storage/publicImages/setting.svg') }}" alt="Settings Img" class="w-10">
                            <span class="hidden md:inline">Bokkings</span>
                        </li>
                    </a>
                    <form class="m-auto" action="{{route('logout')}}" method="post">
                        <button type="submit">
                            <li class="mt-4 flex items-center gap-x-4 bg-red-900 rounded py-2 px-6 hover:bg-red-500">
                                <img src="{{ asset('storage/publicImages/logout.svg') }}"  alt="Settings Img" class="w-10">
                                logout
                                @csrf
                            </li>
                        </button>
                    </form>
                </ul>
            </div>

            <div class="w-4/5 bg-gray-600">
                @yield('content')
            </div>
        </section>
    </main>
</div>
</body>
</html>

