<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'email', 'password', 'bio', 'image'];

    public  function getImageAttribute($val): string
    {
        return  $val ??'profile/aIzhedqBwztawlQ6oUUzIXageI7QscdUMrI1zpKS.png';
    }

    public function publication()
    {
        return $this->hasMany(Publication::class);
    }
}
