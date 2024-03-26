<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
use Psy\Readline\Hoa\EventException;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('show', 'index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $events =  Event::all();
       return response()->json(['events' => $events]);
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
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        try {
            return response()->json([
              'event' =>  $event
            ]);
        }catch (Exception $e){
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     * @throws AuthorizationException
     */
    public function update(Request $request, Event $event)
    {
        $this->authorize('update', $event);
        $eventForm = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'skills_required' => 'required|string',
        ]);
        try {
            $event->fill($eventForm)->update();
            return response()->json([
                'success' => true,
                'message' => 'Event Updated Successfully ' ,
                'event' => $event
            ]);
        }catch (EventException $e){
            return response()->json([
                'success' => false,
                'message' => 'Event Does Updated Successfully ' ,
                'event' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $this->authorize('update', $event);
        $delete = $event->delete();
        return response()->json([
            'success' => $delete,
            'message' => 'the event removed successfully'
        ]);
    }
}
