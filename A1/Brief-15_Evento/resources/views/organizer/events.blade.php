<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Posty | dash</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net"/>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-gray-200">
<section class="flex flex-col sm:flex-row h-screen">
    <div class="sm:w-1/5 bg-gray-900 py-8 px-4">
        <ul class="space-y-[10px]" >

            <li class="flex sm:bg-black items-center gap-x-4  rounded mb-[40px]" >
                <img src="{{asset('storage/Publicimages/logo.svg')}}" alt="Dashboard img" class="w-[200px]" >
            </li>

            <li class="flex sm:bg-black items-center gap-x-4 bg-gray-100/10 rounded py-[8px] px-2 lg:px-6 hover:bg-gray-100/30" >
                <img src="{{asset('storage/Publicimages/dashboardImage.svg')}}" alt="Dashboard img" class="w-[40px]" >
                <a href="{{route('organizer.dashboard')}}" class="hidden lg:flex font-[500] text-lg text-white" >Dashboard</a>
            </li>

            <li class="flex sm:bg-black items-center gap-x-4 bg-gray-100/10 rounded py-[8px] px-2 lg:px-6 hover:bg-gray-100/30" >
                <img src="{{asset('storage/Publicimages/events.svg')}}" alt="Reservation img" class="w-[40px]" >
                <a href="{{route('organizer.events')}}" class="hidden lg:flex font-[500] text-lg text-white" >Events</a>
            </li>

            <li class="flex sm:bg-black items-center gap-x-4 bg-gray-100/10 rounded py-[8px] px-2 lg:px-6 hover:bg-gray-100/30" >
                <img src="{{asset('storage/Publicimages/profile.svg')}}" alt="Profile Img" class="w-[40px]" >
                <a href="{{route('organizer.profile')}}" class="hidden lg:flex font-[500] text-lg text-white" >Profile</a>
            </li>

            <li class="flex sm:bg-black items-center gap-x-4 bg-gray-100/10 rounded py-[8px] px-2 lg:px-6 hover:bg-gray-100/30" >
                <img src="{{asset('storage/Publicimages/settings.svg')}}" alt="Settings Img" class="w-[40px]" >
                <a href="{{route('organizer.settings')}}" class="hidden lg:flex font-[500] text-lg text-white" >Settings</a>
            </li>
        </ul>
    </div>
    <div class="w-full sm:w-4/5 bg-gray-600 p-4" >
        <div class="bg-gray-600">

            <!-- Button to open the modal -->
            <button id="openModalButton" onclick="toggleModal()" class=" bg-gray-900 px-4 py-1 rounded m-4 text-gray-300 hover:text-slate-50-100">Create Event</button>
            @if($errors->any())
                <div class="bg-red-100  w-6/12 m-auto border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Modal backdrop -->
            <div id="modalBackdrop" class="fixed  inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
                <!-- Modal container -->
                <div class="bg-white p-8 s  rounded shadow-md ">
                    <div class="flex justify-between items-baseline">
                        <!-- Modal content -->
                        <h2 class="text-lg  mb-1">Add Event</h2>
                        <!-- Close button -->
                        <button id="closeModalButton" onclick="toggleModal()" class=" bg-gray-900 px-4 py-1 rounded m-4 text-gray-100 hover:text-gray-800">
                            Close
                        </button>
                    </div>

                    <!-- Form -->
                    <form action="{{route('event.store')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-1">
                           <input value="{{old('title')}}" type="text" id="title" name="title"  placeholder="Event Title" class="mt-1 p-2 block w-full text-black border rounded-md @error('title')  border-red-500 @enderror">
                        </div>

                        <div class="mb-1">
                             <textarea id="description" name="description" placeholder="Event Description" class="mt-1 p-2 block w-full border rounded-md @error('description')  border-red-500 @enderror">{{old('description')}}</textarea>
                        </div>

                        <div class="mb-1">
                          <input value="{{old('date')}}" type="date" id="date" name="date" placeholder="Event Date" class="mt-1 p-2 block w-full border rounded-md @error('date')  border-red-500 @enderror">
                        </div>
                        <div class="mb-1">
                            <input value="{{old('time')}}" type="time" id="time" name="time" placeholder="Event Time" class="mt-1 p-2 block w-full border rounded-md @error('time')  border-red-500 @enderror">
                        </div>
                        <div class="mb-1">
                              <input value="{{old('category')}}" class="p-2  rounded w-full border-2 @error('category') border-red-500 @enderror" type="text" list="categoryList" name="category" id="category_id" placeholder="Search for a category ">
                            <datalist id="categoryList">
                                @foreach($categories as $category)
                                <option value="{{$category->name}}">
                                @endforeach
                            </datalist>
                        </div>
                        <div class="mb-1">
                           <input value="{{old('Address')}}" type="text" id="Address" placeholder="Event Address" name="Address" class="mt-1 p-2 block w-full border rounded-md @error('Address')  border-red-500 @enderror">
                        </div>
                        <div class="mb-1">
                            <input value="{{old('poster_image')}}" type="file" id="poster_image" placeholder="Event poster image" name="poster_image" class="mt-1 p-2 block w-full border rounded-md @error('poster_image') border-red-500 @enderror">
                        </div>
                        <div class="mb-1">
                            <input value="{{old('seats')}}" type="number" id="seats" placeholder="Event poster seats" name="seats" class="mt-1 p-2 block w-full border rounded-md @error('seats') border-red-500 @enderror">
                        </div>

                        <div class="mb-1">
                                <select name="confirmation_type"  class="p-2 @error('confirmation_type') border border-red-500 @enderror">
                                    <option selected   >Select Confirmation Type</option>
                                    <option @if(old('confirmation_type') === 'automatic') selected @endif class="automatic">automatic</option>
                                    <option @if(old('confirmation_type') === 'manually') selected @endif class="manually">manually</option>
                                </select>
                        </div>
                        <button type="submit"  class="w-full bg-gray-900 px-4 ml-2 py-2 rounded m-4 text-gray-300 hover:text-slate-50">Submit</button>
                    </form>
                </div>
            </div>
            <div class="grid my-12 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                @foreach ($events as $event)

                    <div class="w-full p-2 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{asset('storage/eventImages/0aJFw9mEYapYielF7QWcllkE3iYs61sEhfBp9dcU.png')}}" alt="Speaker image"/>
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Title : {{$event->title}}</h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400"> <span class="text-xl text-gray-100">Description :</span> {{\Illuminate\Support\Str::limit($event->description, 20)}} </span>
                            <div class="flex mt-4 md:mt-6">
                                <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</a>
                                <a href="{{route('event.show', $event->id)}}" class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="fixed right-24    bottom-10">
                {{$events->links()}}
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let modalBackdrop = document.getElementById('modalBackdrop');
    function toggleModal() {
        modalBackdrop.classList.toggle('hidden');
        return 0;
    }
</script>
</body>
</html>
