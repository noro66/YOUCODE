<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function booking()
    {
        return $this->hasMany(Booking::class, 'booked_by');
    }
}
