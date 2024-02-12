<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
//    for more prfetional (:Collection)
    public function index()
    {
//        return response()->json(Profile::all());
//          return (Profile::all());
//            return  (Profile::withTrashed()->get());
        return (Profile::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $profileForm = $request->all();
        $profileForm['password'] =  Hash::make($request->password);
//        dd($profileForm);
        return Profile::create($profileForm);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return $profile;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $profileform = $request->all();
        $profileform['password'] = Hash::make($request->password);
//        dd($profileform);
        $profile->fill($profileform)->save();
        return $profile;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return response()->json([
           'message' => 'the profile is deleted successfully',
           'id' => $profile->id
        ]);
    }
}
