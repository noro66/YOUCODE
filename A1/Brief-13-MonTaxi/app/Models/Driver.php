<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use HasFactory, SoftDeletes;
    protected  $fillable = [
        'name',
        'description',
        'avatar',
        'phone',
        'matriculate',
        'v_type'
    ];

    public function trip(): HasMany
    {
        return $this->hasMany(Trip::class);
    }
}
