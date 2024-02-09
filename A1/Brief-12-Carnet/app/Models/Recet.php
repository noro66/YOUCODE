<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Recet extends Model
{
    use HasFactory;
    protected  $table = 'recets';
    protected $fillable = ['name', 'description', 'image', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);

    }
}
