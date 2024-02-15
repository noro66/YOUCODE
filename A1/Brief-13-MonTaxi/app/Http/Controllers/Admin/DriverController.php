<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRequest;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::query()->paginate(6);
        return view('driver.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('driver.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DriverRequest $request)
    {
        dd($request);
        $formField = $request->validated();
        if ($request->hasFile('avatar')){
            $formField['avatar'] = $request->file('avatar')->store('DriverImages', 'public');
        }
        Driver::create($formField);
        return to_route('driver.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {

             $trips = $driver->trips()->get();
        return view('driver.show', compact('driver', 'trips'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        return view('driver.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DriverRequest $request, Driver $driver)
    {
        $formField = $request->validated();
        if ($request->hasFile('avatar')){
            $formField['avatar'] = $request->file('avatar')->store('DriverImages', 'public');
        }else{
            unset($formField['avatar']);
        }
        $driver->fill($formField)->save();
        return to_route('driver.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
        return to_route('driver.index');
    }
}
