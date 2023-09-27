<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class watchlist extends Model
{
    use HasFactory;
    function movies(){
        return $this->belongsToMany(movies::class);
    }
    function users(){
        return $this->belongsToMany(users::class);
    }
}
