<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Event;
use http\Env\Response;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;
use Psy\Readline\Hoa\EventException;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'userAccess:volunteer']);

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myApplictions = Auth::user()->volunteer->application;
        return \response()->json([
            'applications' => $myApplictions,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     */
    public function store(Event $event): JsonResponse
    {
        if (!$event->appliedBy(Auth::user())){
            $applicationForm['volunteer_id'] = Auth::user()->volunteer->id;
            $application = $event->application()->create($applicationForm);
            return response()->json([
                'success' => true,
            'application' => $application,
            'volunteer' => Auth::user()->volunteer,
        ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'you already applied for this event',
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application): JsonResponse
    {
        return \response()->json([
            'application' => ['application' => $application, 'event' => $application->event],
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        try
        {
            if ($application->volunteer->id === Auth::user()->volunteer->id){
                $delete = $application->delete();
                return \response()->json([
                    'success' => $delete,
                    'message' => 'the application has ben deleted successfully !!',
                ]);
            }
            return \response()->json([
                'success' => false,
                'message' => 'the application does not exists or you dont have permission to cancel it ',
            ]);
        }catch (Exception $e){
            return \response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function acceptApplication(Application $application, Request $request)
    {
        if (Auth::user()->organizer->id === $application->event->organizer->id){
            if ($request->input('accept') === 'true'){
                $application->accepted = true;
                $application->update();
                return \response()->json([
                    'success' => true,
                    'message' => 'application accepted successfully !!'
                ]);
            }

            $application->delete();
            return  \response()->json([
                'success' => true,
                'message' => 'application  has ben refused successfully!!',
            ]);
        }

    }
}
