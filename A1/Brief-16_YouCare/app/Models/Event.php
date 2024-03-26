<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'organizer_id',
        'title',
        'type',
        'date',
        'location',
        'description',
        'skills_required',
    ];

    // Define the relationship with the organizer
    public function organizer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Organizer::class);
    }
}
