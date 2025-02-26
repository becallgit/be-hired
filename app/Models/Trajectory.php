<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trajectory extends Model
{
    protected $fillable = [
        'employee',
        'from',
        'to',
        'date'
    ];
   protected $table = "trajectory";
}
