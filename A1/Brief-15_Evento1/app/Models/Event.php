<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory , SoftDeletes;
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

    public function category()
    {
       return $this->belongsTo(Category::class, 'category_id');
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

    public function organizer()
    {
        return $this->belongsTo(Organizer::class, 'added_by');
    }

    public function reservedBy(User $user)
    {
      return  $this->booking->contains('booked_by', $user->participant->id);
    }
}
