<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'date',
        'added_by',
        'category_id',
        'Address',
        'poster_image',
        'seats',
        'available_seats',
        'seat_price',
        'status',
        'confirmation_type',
    ];



}
