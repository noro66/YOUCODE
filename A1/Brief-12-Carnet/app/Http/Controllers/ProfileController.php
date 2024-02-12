<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::paginate();
        return view('profile.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfileRequest $request)
    {
        $profileForm = $request->validated();
        $profileForm['password']  = Hash::make($request->password);
        $profileForm['image']  = $request->file('image')->store('profile', 'public');
        Profile::create($profileForm);
        return to_route('profile.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {

        return view('profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {

        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequest $request, Profile $profile)
    {
        $profileForm  = $request->validated();
        if ($request->hasFile('image')){
            $imagePath = $request->file('image')->store('thumbnails', 'public');
            $profileForm['image'] = $imagePath;
        }else{
            unset($profileForm['image']);
        }

        $profile->fill($profileForm)->save();
        return to_route('profile.show', $profile->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
