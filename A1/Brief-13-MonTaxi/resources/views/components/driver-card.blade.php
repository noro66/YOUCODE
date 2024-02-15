@props(['driver'])

<div class="md:w-1/5 flex items-center flex-col my-20 w-80 rounded overflow-hidden shadow-lg">
    <img class="max-w-24 h-[80%]" src="{{ asset('storage/' . $driver->avatar) }}" alt="Driver Avatar">
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">
            {{ $driver->name }}
        </div>
        <div class="font-bold text-xl mb-2"></div>
        <p class="text-gray-700 text-base">
            <span class="block font-bold text-xl">Description :</span>
            {{ Str::words($driver->description, 10, '...') }}
        </p>
    </div>
    <div class="my-6">
        <a href="#" class="px-6 py-2 rounded-full bg-orange-700 hover:bg-slate-900 hover:text-white">See More Details</a>
    </div>
    <div class="my-6 flex items-center justify-between space-x-12">
        <a href="{{ route('driver.edit', $driver) }}" class="px-4 py-1 rounded text-white bg-blue-700 hover:bg-green-900">Update</a>
        <form action="{{ route('driver.destroy', $driver) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" class="px-4 py-1 rounded cursor:pointer text-white bg-red-900 hover:bg-red-600" value="Delete" />
        </form>
    </div>
</div>
