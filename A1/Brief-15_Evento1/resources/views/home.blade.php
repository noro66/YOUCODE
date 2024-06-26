<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet" />
    <title>Evento</title>
</head>

<body>
<nav class="container bg-gray-300 mx-auto p-4">
    <div class="flex items-center justify-between">
        <div>
            <img src="{{asset('storage/publicImages/undraw_cat_epte.svg')}}" class="h-14 rounded-full" alt="Taxi image" width="120px" />
        </div>
        <div class="hidden md:flex md:items-center space-x-6">
            <a href="#" class="text-slate-700 hover:text-red-600">Events</a>
            <a href="#" class="text-slate-700 hover:text-red-600">Organizations</a>
            @auth()
            <a href="{{route( auth()->user()->type . '.dashboard')}}" class="text-slate-700 hover:text-red-600">Dashboard</a>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="px-6 py-2 rounded-full bg-orange-700 hover:bg-slate-900">Logout</button>
                </form>
            @else
                <a href="{{route('auth.login')}}" class="px-6 py-2 rounded-full bg-orange-700 hover:bg-slate-900">Log In</a>
            @endauth
        </div>
        <button id="mobile-button" class=" md:hidden">
            <i class="ri-menu-fill text-2xl"></i>
        </button>
    </div>
    <div class="md:hidden">
        <div id="mobile-menu"
             class="absolute flex hidden flex-col items-center space-y-4 font-bold drop-shadow-lg border border-gray-300 bg-gray-50 py-8 left-6 right-6">
            <a href="#" class="">Events</a>
            <a href="#" class="">Organizations</a>
            @auth()
                <a href="{{route( auth()->user()->type . '.dashboard')}}" class="text-slate-700 hover:text-red-600">Dashboard</a>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="px-6 py-2 rounded-full bg-orange-700 hover:bg-slate-900">Logout</button>
                </form>
                {{Auth::user()->is_restricted}}
            @else
                <a href="{{route('auth.login')}}" class="px-6 py-2 rounded-full bg-orange-700 hover:bg-slate-900">Log In</a>
            @endauth
        </div>
    </div>
</nav>

<section id="hero ">
    <div class="container mt-5 mx-auto px-6 space-x-6 flex flex-col-reverse md:flex-row">
        <div class="md:w-1/2 flex flex-col justify-center space-y-5 py-8 text-center md:text-left text-slate-900">
            <h1 class="font-bold text-3xl md:text-4xl">
                Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.
            </h1>
            <p>
                lorem ipsum dolor sit, amet consectetur adipisicing elit. At
                corporis eum impedit unde iure eius? Qui
            </p>
            @guest()
            <a href="{{route('register')}}"
               class="bg-orange-700 hover:bg-slate-900 self-center md:self-start px-6 py-2 rounded-full">Register
                Now</a>
            @endguest
        </div>

        <div class="md:w-1/2">
            <img src="{{asset('storage/publicImages/undraw_aircraft_re_m05i.svg')}}" alt="Hero image" />
        </div>
    </div>
</section>

<section id="Events">
    <div class="container px-5 mx-auto my-32 text-center">

        <h1 class="font-bold text-5xl underline">
            Latest Events
        </h1>
        <div class="sm:flex sm:wrap justify-around ">
            <form>
                <div class="m-4">
                    <select class="p-2 rounded w-full block border border-gray-300" name="category">
                        <option name="category"  selected disabled>Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <input  type="text" name="title" value="{{Request::input('title')}}" placeholder="Title or description" class="form-input p-1 mt-4  w-44 rounded border border-slate-900">
                    <button  type="submit"  class="form-input bg-gray-900 text-gray-50 cursor-pointer p-1 mt-4  w-44 rounded border border-slate-900">Filter</button>
                </div>
            </form>
        </div>
        @isset($events)
            <div class="container mx-auto mx-10 grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($events as $event)
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg">

                        <a href="{{route('event.show', $event->id)}}">
                        <img src="{{ asset('storage/' . $event->poster_image) }}" alt="Event Image" class="w-full h-64 object-cover">
                        </a>
                            <div class="p-6">
                            <h1 class="text-2xl font-bold mb-2">{{ Str::limit($event->title, 20) }}</h1>
                            <p class="mb-4 text-gray-600">{{ Str::limit($event->description, 45) }}</p>
                            <div class="flex items-center mb-2">
                                <svg class="h-6 w-6 text-gray-500 mr-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span>{{ Carbon\Carbon::parse($event->date)->format('d M Y') }}</span>
                            </div>
                            <div class="flex items-center mb-2">
                                <svg class="h-6 w-6 text-gray-500 mr-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M3 21v-2a4 4 0 014-4h10a4 4 0 014 4v2m-3-10a4 4 0 11-8 0 4 4 0 018 0zM3 7h18M4 11v-6a1 1 0 011-1h14a1 1 0 011 1v6m-5 4h3"></path>
                                </svg>
                                <span>{{ Str::limit($event->Address, 45) }}</span>
                            </div>
                            <div class="flex items-center mb-2">
                                <svg class="h-6 w-6 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span>{{ $event->category->name }}</span>
                            </div>
                            <div class="flex items-center mb-2">
                                <svg class="h-6 w-6 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                <span>{{ $event->available_seats }} / {{ $event->seats }} seats available</span>
                            </div>
                            <div class="flex items-center mb-2">
                                <svg class="h-6 w-6 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span>{{ $event->seat_price ?? 'Free' }}</span>
                            </div>
                            @can('view', $event)
                                <div class="flex items-center mb-2">
                                    <svg class="h-6 w-6 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <span>{{ ucfirst($event->status) }}</span>
                                </div>
                            @endcan
                            @can('reserve', $event)
                                <form action="{{route('event.booking', $event->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                        Book Now
                                    </button>
                                </form>
                            @endcan
                            @can('canselReservation', $event)
                            <form action="{{route('event.booking', $event->id)}}" method="post" class="mr-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to cancel this Booking ?')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Cancel Reservation
                                </button>
                            </form>
                            @endcan
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No events available.</p>
        @endisset
    </div>
        <div class="my-4 flex justify-center items-center">
            {{ $events->links() }}
        </div>
</section>



<footer class="bg-slate-900">
    <div
        class="container mx-auto text-white px-5 py-10 flex flex-col-reverse md:flex-row justify-between space-y-8 md:space-y-0">
        <div class="flex flex-col items-center justify-between space-y-12 md:space-x-2 md:items-start">
            <div>
                <img src="{{asset('storage/publicImages/undraw_cat_epte.svg')}}" class="h-14 rounded-full" alt="Taxi image" width="120px" />
            </div>
            <div class="flex space-x-2">
                <a href="#"><i class="ri-facebook-circle-fill text-3xl"></i></a>
                <a href="#"><i class="ri-instagram-line text-3xl"></i></a>
                <a href="#"><i class="ri-linkedin-box-line text-3xl"></i></a>
                <a href="#"><i class="ri-youtube-line text-3xl"></i></a>
                <a href="#"><i class="ri-twitter-x-line text-3xl"></i></a>
            </div>
        </div>

        <div class="flex justify-evenly md:space-x-32 ">
            <div class="flex flex-col space-y-9">
                <a href="" class="hover:text-slate-300">Home</a>
                <a href="" class="hover:text-slate-300">About</a>
                <a href="" class="hover:text-slate-300">Contact</a>
            </div>
            <div class="flex flex-col space-y-9">
                <a href="" class="hover:text-slate-300">Imprint</a>
                <a href="" class="hover:text-slate-300">Privacy</a>
                <a href="" class="hover:text-slate-300">Credits</a>
            </div>
        </div>

        <div class="flex flex-col justify-between items-center ">
            <form action="#">
                <input type="text" placeholder="Subsribe to NewsLetter" class="flex-1 mb-4 py-2 px-6 rounded-full">
                <button class="bg-orange-500 hover:bg-slate-900 rounded-full py-2 px-6">Submit</button>
            </form>
            <div class="hidden md:block ">
                CopyRight &copy; 2024 All Right Not Reserved
            </div>
        </div>
    </div>
</footer>

<script>
    const mobileButton = document.getElementById('mobile-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden')
    });
</script>
</body>

</html>
