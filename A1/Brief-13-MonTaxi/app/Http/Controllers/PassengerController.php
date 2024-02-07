<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    public function store()
    {
        $passenger = new  Passenger;
        $passenger->save();

        $array = [
            'name' =>'brahim',
            'email' => 'brahim@gmail.com',
            'password' => 'brahim',
            'userable_type' => 'Passenger',
            'userable_id' => $passenger->id
        ];
        $passenger->users()->create($array);
    }

    public function show()
    {

        $passenger = Passenger::find(1);
        $user = $passenger->users()->get();
        print_r($user);

    }
}
