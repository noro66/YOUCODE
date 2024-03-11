<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $eventQuery = Event::query();
        $title = $request->input('title');
        if ($title){
            $eventQuery->where('title',  'like', "%{$title}%");
        }

//        dd('ok');
//        $title = $request->validate([
//            'title' => 'required'
//        ]);
//
////        ->where('status' , '=', 'Approved')->paginate(6)

        $events =  $eventQuery->get();
        return view('home', compact('events'));
    }
}
