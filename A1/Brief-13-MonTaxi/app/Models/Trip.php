<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trip extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'departure',
        'destination',
        'departure_time',
        'Trip_duration',
        'trip_image',
        'trip_description',
        'price',
        'driver_id'
    ];
    public function driver(): BelongsTo
    {
        return  $this->belongsTo(Driver::class);
    }
}
