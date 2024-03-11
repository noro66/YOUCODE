<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
//        dd('ok');
//        $title = $request->validate([
//            'title' => 'required'
//        ]);
//
////        ->where('status' , '=', 'Approved')->paginate(6)

        $events =  Event::latest()->paginate(3);
        return view('home', compact('events'));
    }
}
