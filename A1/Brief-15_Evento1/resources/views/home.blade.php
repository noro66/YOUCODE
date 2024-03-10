<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet" />
    <title>Tailwind Css</title>
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
            <a href="#" class="text-slate-700 hover:text-red-600">Socials</a>
            <a href="#" class="px-6 py-2 rounded-full bg-orange-700 hover:bg-slate-900">Log In</a>
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
            <a href="#" class="">Socials</a>
            <a href="#" class="px-6 py-2 rounded-full bg-orange-700 hover:bg-slate-900">Log In</a>
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
            <a href="#"
               class="bg-orange-700 hover:bg-slate-900 self-center md:self-start px-6 py-2 rounded-full">Regester
                Now</a>
        </div>

        <div class="md:w-1/2">
            <img src="{{asset('storage/publicImages/undraw_aircraft_re_m05i.svg')}}" alt="Hero image" />
        </div>
    </div>
</section>

<section id="drivers">
    <div class="container px-5 mx-auto my-32 text-center">
        <h1 class="font-bold text-4xl">
            Lorem ipsum dolor sit amet consectetur adipisicing.
        </h1>
        <div class="mt-10 flex flex-col items-center md:flex-row md:space-x-5 space-y-5 md:space-y-0">
            <div class="md:w-1/3 bg-slate-200 flex flex-col p-5 space-y-2 rounded-lg border border-slate-300">
                <img class="self-center" src="{{asset('storage/publicImages/undraw_pic_profile_re_7g2h.svg')}}" width="100px" alt="" />
                <h5 class="font-bold text-xl">Amad Smith</h5>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Laboriosam non odio cupiditate, a aspernatur sed corporis
                    assumenda mo items-centerdi officiis recusandae.
                </p>
            </div>
            <div class="md:w-1/3 bg-slate-200 flex flex-col p-5 space-y-2 rounded-lg border border-slate-300">
                <img class="self-center" src="{{asset('storage/publicImages/undraw_pic_profile_re_7g2h.svg')}}" width="100px" alt="" />
                <h5 class="font-bold text-xl">Amad Smith</h5>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Laboriosam non odio cupiditate, a aspernatur sed corporis
                    assumenda mo items-centerdi officiis recusandae.
                </p>
            </div>
            <div class="md:w-1/3 bg-slate-200 flex flex-col p-5 space-y-2 rounded-lg border border-slate-300">
                <img class="self-center" src="{{asset('storage/publicImages/undraw_pic_profile_re_7g2h.svg')}}" width="100px" alt="" />
                <h5 class="font-bold text-xl">Amad Smith</h5>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Laboriosam non odio cupiditate, a aspernatur sed corporis
                    assumenda modi officiis recusandae.
                </p>
            </div>
        </div>
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
