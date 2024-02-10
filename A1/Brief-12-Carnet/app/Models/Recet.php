<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use mysql_xdevapi\Table;

class Recet extends Model
{
    use HasFactory, SoftDeletes;
    protected  $table = 'recets';
    protected $fillable = ['name', 'description', 'image', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);

    }
}
