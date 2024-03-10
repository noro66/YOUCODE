<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Models\Category;

class EventController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('organizer.event.create', compact('categories'));
    }
}
