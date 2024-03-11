<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $eventQuery = Event::query();
        $title = $request->input('title');
        $categoryId = $request->input('category');

        if ($title) {
            $eventQuery->where('title', 'like', "%{$title}%");
        }

        if ($categoryId) {
            $eventQuery->whereIn('category_id', [$categoryId]);
        }


        $categories = Category::whereHas('events', function ($query) {
            $query->where('status', 'Approved');
        })->get();

        $events = $eventQuery->where('status' , '=', 'Approved')->get();

        return view('home', compact('events', 'categories'));
    }

}
