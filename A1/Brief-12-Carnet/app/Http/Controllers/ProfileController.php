<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Mail\ProfileMail;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//         $profiles = Cache::remember('profiles', 100, function (){
//           return Profile::paginate();
//        });
        dd(DB::table('profiles')->join('publications', 'profiles.id' , '=', 'publications.profile_id')->get());

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
       $profile =  Profile::create($profileForm);
        Mail::to('jamilljamili@gmail.com')->send(new  ProfileMail($profile));
        return to_route('profile.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
    //        $cachPrefex = 'profile_' . $profile->id;
    ////        dd($cachPrefex);
    //        if (Cache::has($cachPrefex)){
    //            $profile  = Cache::get($cachPrefex);
    //        }else{
    //            Cache::put($cachPrefex , $profile, 100);
    //        }
//        $profile = Cache::remember('profile_' . $profile->id, 100, function () use ($profile){
//            return $profile;
//        });
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
