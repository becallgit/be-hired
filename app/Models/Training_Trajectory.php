<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training_Trajectory extends Model
{
    protected $fillable = [
        'training',
        'personal',
        'product_knowdeledge',
        'commercial_attitude',
        'data_protection',
        'personal_attitude',
        'days_completed'
    ];
   protected $table = "training_trajectory";
}
