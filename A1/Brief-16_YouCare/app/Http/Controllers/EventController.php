<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
use Psy\Readline\Hoa\EventException;

/**
 * @OA\Info(
 * title="Swagger with Laravel",
 * version="1.0.0",
 * )
 * @OA\SecurityScheme(
 * type="http",
 * securityScheme="bearerAuth",
 * scheme="bearer",
 * bearerFormat="JWT"
 * )
 */
class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'userAccess:organizer'])->except('show', 'index');
    }

    /**
     * @OA\Get(
     *     path="/api/event",
     *     summary="Get a list of events",
     *     tags={"Events"},
     *     @OA\Response(
     *         response=200,
     *         description="List of events",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="http://127.0.0.1:8000/api/event")
     *         )
     *     )
     * )
     */

    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $eventQuery = Event::query();
        $type = $request->input('type');
        $location = $request->input('location');

        if ($type) {
            $eventQuery->where('type', 'like', "%{$type}%");
        }

        if ($location) {
            $eventQuery->where('location', 'like', "%{$type}%");
        }

        $events = $eventQuery->get();

       return response()->json(['events' => $events]);
    }

    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     */
    /**
     * @OA\Post(
     *     path="/api/event",
     *     summary="Create a new event",
     *     tags={"Events"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="title", type="string", example="Event Title"),
     *             @OA\Property(property="type", type="string", example="Event Type"),
     *             @OA\Property(property="date", type="string", format="date", example="2024-04-01"),
     *             @OA\Property(property="location", type="string", example="Event Location"),
     *             @OA\Property(property="description", type="string", example="Event Description"),
     *             @OA\Property(property="skills_required", type="string", example="Skills Required")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Event Created Successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Event Created Successfully"),
     *             @OA\Property(property="event", ref="http://127.0.0.1:8000/api/event")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Event Creation Failed",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Event Creation Failed"),
     *             @OA\Property(property="event", type="string")
     *         )
     *     )
     * )
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
    /**
     * @OA\Get(
     *     path="/events/{event}",
     *     summary="Get details of an event",
     *     description="Returns details of a specific event.",
     *     operationId="getEvent",
     *     tags={"Events"},
     *     @OA\Parameter(
     *         name="event",
     *         in="path",
     *         description="ID of the event to retrieve",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             ref="http://127.0.0.1:8000/api/event/:id"
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Event not found"
     *     )
     * )
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
