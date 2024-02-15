<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripRequest;
use App\Models\Driver;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trips = Trip::query()->with('driver')->paginate(6);
        return view('trip.index', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $drivers = Driver::all();
        return view('trip.create', compact('drivers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TripRequest $request)
    {
        $formField = $request->validated();
        $formField['departure_time'] = $formField['departure_time'] . ' '. $formField['time'];
        if ($request->hasFile('trip_image')){
            $formField['trip_image'] = $request->file('trip_image')->store('TripImages', 'public');
        }
       Trip::create($formField);
        return to_route('trip.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Trip $trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        $drivers = Driver::all();
        return view('trip.edit', compact('trip', 'drivers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TripRequest $request, Trip $trip)
    {
        $formField = $request->validated();
        $formField['departure_time'] = $formField['departure_time'] . ' '. $formField['time'];
        if ($request->hasFile('trip_image')){
            $formField['trip_image'] = $request->file('trip_image')->store('TripImages', 'public');
        }else{
            unset($formField['trip_image']);
        }
      $trip->fill($formField)->save();
        return to_route('trip.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        $trip->delete();
        return to_route('trip.index');
    }
}
