<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test extends Controller
{
    public  function index(Request $request)
    {
        $nom = 'nom of me';
        $age = '24';
        $countries = ['country1', 'country2', 'country3', 'country4'];

        return view('welcome ',compact('nom', 'age', 'countries'));
    }
}
