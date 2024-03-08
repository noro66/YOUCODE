<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Posty | dash</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-gray-200 ">
<section class="w-full h-screen flex justify-between items-center">
    <div class="w-[20vw] h-screen bg-gray-900 py-[30px] px-8">
        <ul class="space-y-[10px]" >

            <li class="flex items-center gap-x-4 rounded mb-[40px]" >
                <img src="{{asset('storage/Publicimages/logo.svg')}}" alt="Dashboard img" class="w-[200px]" >
            </li>

            <li class="flex items-center gap-x-4 bg-gray-100/10 rounded py-[8px] px-2 lg:px-6 hover:bg-gray-100/30" >
                <img src="{{asset('storage/Publicimages/dashboardImage.svg')}}" alt="Dashboard img" class="w-[40px]" >
                <a href="{{route('organizer.dashboard')}}" class="hidden lg:flex font-[500] text-lg text-white" >Dashboard</a>
            </li>

            <li class="flex items-center gap-x-4 bg-gray-100/10 rounded py-[8px] px-2 lg:px-6 hover:bg-gray-100/30" >
                <img src="{{asset('storage/Publicimages/events.svg')}}" alt="Reservation img" class="w-[40px]" >
                <a href="{{route('organizer.events')}}" class="hidden lg:flex font-[500] text-lg text-white" >Events</a>
            </li>

            <li class="flex items-center gap-x-4 bg-gray-100/10 rounded py-[8px] px-2 lg:px-6 hover:bg-gray-100/30" >
                <img src="{{asset('storage/Publicimages/profile.svg')}}" alt="Profile Img" class="w-[40px]" >
                <a href="{{route('organizer.profile')}}" class="hidden lg:flex font-[500] text-lg text-white" >Profile</a>
            </li>

            <li class="flex items-center gap-x-4 bg-gray-100/10 rounded py-[8px] px-2 lg:px-6 hover:bg-gray-100/30" >
                <img src="{{asset('storage/Publicimages/settings.svg')}}" alt="Settings Img" class="w-[40px]" >
                <a href="{{route('organizer.settings')}}" class="hidden lg:flex font-[500] text-lg text-white" >Settings</a>
            </li> <li class="flex cursor-pointer items-center gap-x-4 bg-gray-100/10 rounded py-[8px] px-2 lg:px-6 hover:bg-gray-100/30" >
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('organizer.logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
            </li>

        </ul>
    </div>
    <div class="w-[80%] h-[100vh] bg-gray-600" >

    </div>
</section>
</body>
</html>