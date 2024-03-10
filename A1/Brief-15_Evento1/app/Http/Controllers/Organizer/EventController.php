<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    public function index()
    {
       $events =  Event::latest()->paginate(4);
        return view('organizer.event.index', compact('events'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('organizer.event.create', compact('categories'));
    }

    public function store(EventRequest $request)
    {
        $eventForm = $request->validated();
        $eventForm['poster_image']  = $request->file('poster_image')->store('eventImages', 'public');
        $eventForm['date'] .= ' ' . $eventForm['time'];
        $eventForm['added_by'] = Auth::user()->organizer->id;
        unset($eventForm['time'], $eventForm['_token']);
        $eventForm['category_id'] =  Category::where('name', $eventForm['category'])->first()->id;
        $eventForm['available_seats'] = $eventForm['seats'];
        Event::create($eventForm);
        return to_route('event.index');
    }
    public function edit(Event $event)
    {
        $categories = Category::all();
        return view('organizer.event.edit', compact('event', 'categories'));
    }

    public function update(EventRequest $request, Event $event)
    {
        $eventForm = $request->validated();
        if ($request->hasFile('poster_image')){
        $eventForm['poster_image']  = $request->file('poster_image')->store('eventImages', 'public');
        }else{
            unset($eventForm['poster_image']);
        }
        $eventForm['date'] .= ' ' . $eventForm['time'];
        unset($eventForm['time'], $eventForm['_token']);
        $eventForm['category_id'] =  Category::where('name', $eventForm['category'])->first()->id;
        $eventForm['available_seats'] = $eventForm['seats'];
        $event->fill($eventForm)->update();
        return to_route('event.index');
    }

    public function destroy()
    {

    }
}
