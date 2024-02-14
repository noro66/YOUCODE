@props(['trip'])

<a href="{{ route('trip.index') }}" class=" px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Back</a>

<form action="@yield('rout')"  method="POST" enctype="multipart/form-data"  class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">

    @csrf
    @yield('type')
    <!-- departure -->
    <div class="mb-4">
        <label for="departure" class="block text-sm font-semibold text-gray-600">Departure :</label>
        <input type="text" id="departure" name="departure" value="{{ old('departure', $trip->departure ?? '') }}" class="mt-1 p-2 w-full border rounded-md">
        @error('departure') <span class="text-red-500">{{$message}}</span>@enderror
    </div>
    <!-- destination -->
    <div class="mb-4">
        <label for="destination" class="block text-sm font-semibold text-gray-600">Destination :</label>
        <input type="text" id="destination" name="destination" value="{{  old('destination', $trip->destination ?? '') }}" class="mt-1 p-2 w-full border rounded-md">
        @error('destination') <span class="text-red-500">{{$message}}</span>@enderror
    </div>

    {{--    Trip Duraiton--}}
    <div class="mb-4">
        <label for="Trip_duration" class="block text-sm font-semibold text-gray-600">Trip Durations :</label>
        <input type="number" id="Trip_duration" name="Trip_duration" value="{{  old('Trip_duration', $trip->Trip_duration ?? '') }}" class="mt-1 p-2 w-full border rounded-md">
        @error('Trip_duration') <span class="text-red-500">{{$message}}</span>@enderror
    </div>
    {{--   Departure Time--}}
    <div class="mb-4">
        <label for="departure_time" class="block text-sm font-semibold text-gray-600">Departure Time :</label>
        <input type="date" id="departure_time" name="departure_time" value="{{  old('departure_time', $trip->departure_time ?? '') }}" class="mt-1 p-2 w-full border rounded-md">
        <div class="my-4">
            <label for="departure_time"  class="mt-1 p-2 w-full border rounded-md" text-gray-600"> Time :</label>
            <input type="time" name="time">
        </div>
        @error('departure_time') <span class="text-red-500">{{$message}}</span>@enderror
        @error('time') <span class="text-red-500">{{$message}}</span>@enderror
    </div>


    <!-- trip_description -->
    <div class="mb-4">
        <label for="trip_description" class="block text-sm font-semibold text-gray-600">Trip Description :</label>
        <textarea id="trip_description" name="trip_description" rows="4" class="mt-1 p-2 w-full border rounded-md">{{  old('trip_description', $trip->trip_description ?? ' ')}}</textarea>
        @error('trip_description') <span class="text-red-500">{{$message}}</span>@enderror
    </div>

    {{-- price--}}
    <div class="mb-4">
        <label for="price" class="block text-sm font-semibold text-gray-600">Price :</label>
        <input type="number" id="price" name="price" value="{{  old('price', $trip->price ?? '') }}" class="mt-1 p-2 w-full border rounded-md">
        @error('rice') <span class="text-red-500">{{$message}}</span>@enderror
    </div>
    <!-- Image -->
    <div class="mb-4">
        <label for="trip_image" class="block my-2 text-sm font-semibold text-gray-600">Image :</label>
        @if(isset($trip->trip_image) )
            <img src="{{asset('storage/' . $trip->trip_image)}}" class="w-20" alt="">
        @endif
        <input type="file" id="trip_image" name="trip_image" accept="image/*" class="mt-1 p-2 w-full border rounded-md">
        @error('trip_image') <span class="text-red-500">{{$message}}</span>@enderror
    </div>
    <div class="mt-4">
        <button type="submit" class="px-4 py-2 bg-orange-700 text-white rounded-md hover:bg-orange-600">Submit</button>
    </div>
</form>
