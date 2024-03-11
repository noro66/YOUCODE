<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'added_by');
    }
    public function bookings()
    {
        return $this->hasManyThrough(Booking::class, Event::class, 'added_by', 'event_id', 'id', 'id');
    }

}
