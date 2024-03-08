<?php

namespace App\Http\Controllers\organizer;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequist;
use App\Models\Category;
use App\Models\Event;
use App\Models\Organizer;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function store(EventRequist $request)
    {

        if (!$request->validated()) {
            // Redirect back with errors
            return to_route('organizer.events')->withErrors($request)->withInput();
        }
        $eventForm = $request->all();
        $eventForm['poster_image']  = $request->file('poster_image')->store('eventImages', 'public');
        $eventForm['date'] .= ' ' . $eventForm['time'];
        $eventForm['added_by'] = Auth::guard('organizer')->id();
        unset($eventForm['time'], $eventForm['_token']);
        $eventForm['category_id'] =  Category::where('name', $eventForm['category'])->first()->id;
        $eventForm['available_seats'] = $eventForm['seats'];
        Event::create($eventForm);
        return Auth::guard('organizer')->user()->event->count();
    }
}
