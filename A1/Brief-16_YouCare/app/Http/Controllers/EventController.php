<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\Readline\Hoa\EventException;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('create', Event::class);
        $eventForm = $request->validate([
//            'organizer_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'skills_required' => 'required|string',
        ]);
        try {
            $eventForm['organizer_id'] = Auth::user()->organizer->id;
            $event =  Event::create($eventForm);
            return response()->json([
               'success' => true,
               'message' => 'Event Created Successfully ' ,
                'event' => $event
            ]);
        }catch (EventException $e){
            return response()->json([
                'success' => false,
                'message' => 'Event Does Created Successfully ' ,
                'event' => $e->getMessage(),
            ]);
        }



    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
