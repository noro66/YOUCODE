<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicationRequest;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use JetBrains\PhpStorm\NoReturn;

class PublicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publications = Publication::latest()->get();

        return view('publication.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publication.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicationRequest $request)
    {

        $publicationForm = $request->validated();
        $publicationForm['image']  = $request->file('image')->store('publications', 'public');
        $publicationForm['profile_id'] = Auth::id();
        Publication::create($publicationForm);
        return to_route('publication.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication, Request $request)
    {
//         if (Gate::allows('update-publication', $publication)){
//            abort(403);
//         }
//        Gate::authorize('update-publication', $publication);
////        Gate::authorize('update', $publication);
//            if($request->user()->canNot('update', $publication)){
//                abort(403);
//            };
        // Best Way is this by using  policies
        $this->authorize('update', $publication);
        return view('publication.edit', compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublicationRequest $request, Publication $publication)
    {
        Gate::authorize('update-publication', $publication);
            $publicationForm  = $request->validated();
        if ($request->hasFile('image')){
            $imagePath = $request->file('image')->store('thumbnails', 'public');
            $publicationForm['image'] = $imagePath;
        }else{
            unset($publicationForm['image']);
        }

        $publication->fill($publicationForm)->save();
        return to_route('publication.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        Gate::authorize('update-publication', $publication);
        $publication->delete();
        return to_route('publication.index');
    }
}
