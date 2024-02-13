<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use \Illuminate\Support\Facades\Cache;
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
//          $profile = Profile::all();
//        return new ProfileResource($profile);
       $profile = Cache::remember('proflies_api', 14400, function (){
        return ProfileResource::collection(Profile::all());
        });
       return $profile;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $profileForm = $request->all();
        $profileForm['password'] =  Hash::make($request->password);
//        dd($profileForm);
        $profile = Profile::create($profileForm);
      return new ProfileResource($profile);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return new ProfileResource($profile);
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
        return new  ProfileResource($profile);
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
        ], 201);
    }
}
