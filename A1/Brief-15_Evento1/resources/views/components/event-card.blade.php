@props(['categories', 'event', 'route', 'method', 'id'])

<form action="{{route($route, $id ?? null)}}" method="POST" enctype="multipart/form-data"
      class="max-w-lg mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-1">
    @csrf
    @method($method)
    <div class="mb-1">
        <input value="{{ $event->title  ?? old('title') }}" type="text" id="title" name="title" placeholder="Event Title"
               class="mt-1  p-2 block w-full border rounded-md focus:outline-none focus:border-indigo-300 @error('title') border-red-600 @enderror">
    </div>

    <div class="mb-1">
        <textarea id="description" name="description" placeholder="Event Description" rows="3"
                  class="mt-1  p-2 block w-full border rounded-md focus:outline-none focus:border-indigo-300 @error('description') border-red-600  @enderror">{{ $event->description  ?? old('description') }}</textarea>
    </div>

    <div class="mb-1">
        <input value="{{ Carbon\Carbon::parse($event->date)->format('Y-m-d')  ?? old('date') }}" type="date" id="date" name="date" placeholder="Event Date"
               class="mt-1 p-2 block w-full border rounded-md focus:outline-none focus:border-indigo-300 @error('date') border-red-600 @enderror  ">
    </div>

    <div class="mb-1">
        <input value="{{ Carbon\Carbon::parse($event->date)->format('H:i')  ?? old('time') }}" type="time" id="time" name="time" placeholder="Event Time"
               class="mt-1  p-2 block w-full border rounded-md focus:outline-none focus:border-indigo-300 @error('time') border-red-600 @enderror ">
    </div>

    <div class="mb-1">
        <input class="p-2 rounded w-full border border-gray-300 @error('category') border-red-600 @enderror "
               value="{{ $event->category->name  ?? old('category') }}" type="text" list="categoryList" name="category"
               id="category_id" placeholder="Search for a category">
        <datalist id="categoryList">
            @foreach($categories as $category)
                <option value="{{$category->name}}">
            @endforeach
        </datalist>
    </div>

    <div class="mb-1">
        <input value="{{ $event->Address  ?? old('Address') }}" type="text" id="Address" placeholder="Event Address"
               name="Address"
               class="mt-1  p-2 block w-full border rounded-md focus:outline-none focus:border-indigo-300 @error('Address') border-red-600 @enderror ">
    </div>

    <div class="mb-1">
        <input value="{{ $event->poster_image  ?? old('poster_image') }}" type="file" id="poster_image"
               name="poster_image"
               class="mt-1  p-2 block w-full border rounded-md focus:outline-none focus:border-indigo-300 @error('poster_image') border-red-600 @enderror">
    </div>

    <div class="mb-1">
        <input value="{{ $event->seats  ?? old('seats') }}" type="number" id="seats" placeholder="Event Seats"
               name="seats"
               class="mt-1  p-2 block w-full border rounded-md focus:outline-none focus:border-indigo-300 @error('seats') border-red-600 @enderror ">
    </div>

    <div class="mb-1">
        <select name="confirmation_type"
                class="p-2 w-full border rounded-md focus:outline-none focus:border-indigo-300 @error('confirmation_type') border-red-600 @enderror">
            <option selected>Select Confirmation Type</option>
            <option value="automatic" @if(old('confirmation_type') === 'automatic' || ($event ?? null && $event->confirmation_type === 'automatic')) selected
                    @endif class="automatic">Automatic
            </option>
            <option value="manually" @if(old('confirmation_type') === 'manually' || ($event ?? null && $event->confirmation_type === 'manually')) selected
                    @endif class="manually">Manually
            </option>
        </select>
    </div>

    <button a type="submit"
            class="bg-gray-900 w-full mt-1 text-white py-2 px-4 rounded hover:bg-gray-800 focus:outline-none focus:bg-gray-800">
        Submit
    </button>
</form>
