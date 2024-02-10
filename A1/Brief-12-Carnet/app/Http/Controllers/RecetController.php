<?php

namespace App\Http\Controllers;

use App\Models\Recet;
use Illuminate\Http\Request;

class  RecetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receipts = Recet::paginate();
        return view('Recet.index', compact('receipts'));
    }

    /**
     * Display the specified resource.
     */
        public function show(Recet $recet)
    {
        return view('Recet.show', compact('recet'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Recet.create');

    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {

            // Validate the request data
            $attributes = $request->validate([
                'name' => 'required|max:255',
                'description' => 'required|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the image validation rules as needed
            ]);

            // Process and store the image
            $imagePath = $request->file('image')->store('thumbnails', 'public');
            $attributes['image'] = $imagePath;

            // Save the receipt with the image path in the database
            Recet::create($attributes);

            // Redirect to the create page with a success message
            return redirect()->back()->with('success', 'Receipt created successfully.');
        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recet $recet)
    {
        return view('Recet.edit', compact('recet')) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recet $recet)
    {
        $attributes = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the image validation rules as needed
        ]);

        // Process and store the image
        if ($request->hasFile('image')){
            $imagePath = $request->file('image')->store('thumbnails', 'public');
            $attributes['image'] = $imagePath;
        }
        // Save the receipt with the image path in the database
        $recet->fill($attributes)->save();

        // Redirect to the create page with a success message
        return to_route('recets.show', $recet->id)->with('success', 'Receipt created successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recet $recet)
    {
       $recet->delete();
        return to_route('recets.index');
    }

    public  function search(Request $request)
    {
        $text = $request->input('search');
        $receipts = Recet::where( 'name', 'LIKE', '%' . $text . '%')->get();
        return view('Recet.index', compact('receipts'));

    }
}
