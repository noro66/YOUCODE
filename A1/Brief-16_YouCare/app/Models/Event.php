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
    public function application()
    {
        return $this->hasMany(Application::class, 'event_id');
    }

    public function appliedBy(User $user)
    {
        return  $this->application->contains('volunteer_id', $user->volunteer->id);
    }
}
