<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;

    /**
     * @var mixed|string
     */
    public mixed $phone;
    protected  $guarded = [];

    public  function users()
    {
        return $this->morphOne(User::class, 'userable' );
    }

}
