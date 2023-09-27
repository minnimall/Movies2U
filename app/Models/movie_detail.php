<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movie_detail extends Model
{
    use HasFactory;
    use SoftDeletes;
    function movies(){
        return $this->belongsToMany(Movie::class);
        }
    function employees(){
        return $this->belongsToMany(Employee::class);
        }
    function employee_types(){
        return $this->belongsToMany(Employee_type::class);
        }
}
