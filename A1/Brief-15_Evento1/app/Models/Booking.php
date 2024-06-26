<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'booked_by'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function participant()
    {
      return  $this->belongsTo(Participant::class, 'booked_by');
    }
}
