@props(['publication'])
<div class="bg-white p-4 rounded-md shadow-md">

    <img class="w-full h-64" src="{{ asset('storage/' . $publication->image ) }}" alt="receipt image">
    <h3 class="text-l font-semibold mb-2">Publicaton : {{$publication->id}}</h3>
    <img class="w-20 h-30 rounded-full" src="{{ asset('storage/' . $publication->profile->image ) }}" alt="Profile image">
    <h3 class="text-l font-semibold mb-2">Autor : {{$publication->profile->name}}</h3>
    <p class="text-black-600 mb-2 text-xl"> Title : {{$publication->title}}</p>
    <p class="text-gray-600 mb-2"><strong>Description  :</strong> {{$publication->body}}</p>

    @can('update', $publication)
            <a href="{{route('publication.edit', $publication->id)}}" class="px-4 m-3 py-2 bg-blue-500 text-white rounded-md hover:bg-green-600">Update</a>
    @endcan
    @can('delete', $publication)
            <form action="{{ route('publication.destroy', $publication->id )}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')" class="px-4 py-2 m-3 bg-blue-500 text-white rounded-md hover:bg-red-600">Delete</button>
            </form>
    @endcan
</div>
<br>
