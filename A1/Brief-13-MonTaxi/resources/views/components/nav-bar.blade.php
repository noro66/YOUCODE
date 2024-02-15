<nav class="container bg-white-900 mx-auto p-4">
    <div class="flex items-center justify-between">
        <div>
            <img src="storage/images/undraw_cat_epte.svg" class="h-14 rounded-full" alt="Taxi image" width="120px" />
        </div>
        <div class="hidden md:flex md:items-center space-x-6">
            <a href="#" class="text-slate-700 hover:text-red-600">Trips</a>
            <a href="#" class="text-slate-700 hover:text-red-600">Drivers</a>
            <a href="#" class="text-slate-700 hover:text-red-600">Contact</a>
            <a href="#" class="text-slate-700 hover:text-red-600">About</a>
            <a href="#" class="px-6 py-2 rounded-full bg-orange-700 hover:bg-slate-900">Sign Up</a>
        </div>
        <button id="mobile-button" class=" md:hidden">
            <i class="ri-menu-fill text-2xl"></i>
        </button>
    </div>
    <div class="md:hidden">
        <div id="mobile-menu"
             class="absolute flex hidden flex-col items-center space-y-4 font-bold drop-shadow-lg border border-gray-300 bg-gray-50 py-8 left-6 right-6">
            <a href="#" class="">Trips</a>
            <a href="#" class="">Drivers</a>
            <a href="#" class="">Contact</a>
            <a href="#" class="">About</a>
            <a href="#" class="px-6 py-2 rounded-full bg-orange-700 hover:bg-slate-900">Sign Up</a>
        </div>
    </div >
</nav>
