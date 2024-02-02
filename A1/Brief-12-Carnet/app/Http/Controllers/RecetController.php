<?php

namespace App\Http\Controllers;

use App\Models\Recet;
use Illuminate\Http\Request;

class RecetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receipts = Recet::get();

        return view('Recet.index', compact('receipts'));
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
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('public/thumbnails', $imageName);

            // Save the receipt with the image path in the database
            $attributes['image'] = $imagePath;
            Recet::create($attributes);

            // Redirect to the create page with a success message
            return redirect()->back()->with('success', 'Receipt created successfully.');
        }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $recet = Recet::find($id);
        return view('Recet.edit', compact('recet')) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $attributes = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the image validation rules as needed
        ]);

        // Process and store the image
        $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $imagePath = $request->file('image')->storeAs('public/thumbnails', $imageName);

        // Save the receipt with the image path in the database
        $attributes['image'] = $imagePath;
        Recet::find($id)->update($attributes);

        // Redirect to the create page with a success message
        return redirect()->back()->with('success', 'Receipt created successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        Recet::find($id)->delete();
        return redirect()->back()->with('success', 'Receipt created successfully.');

        //
    }
}
