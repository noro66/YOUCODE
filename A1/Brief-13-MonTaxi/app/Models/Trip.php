<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'departure',
        'destination',
        'departure_time',
        'Trip_duration',
        'trip_image',
        'trip_description',
        'price'
    ];
}
