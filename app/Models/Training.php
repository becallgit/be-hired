<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'project',
        'company',
        'work_center',
        'trainer',
        'hall',
        'personal_count',
        'recruiter',
        'start_date',
        'end_date',
        'total_days',
        'announcement',
        'completed',
        'starting_count',
        'ending_count',
        'trial_passed_out',
        'noted'
    ];
   protected $table = "training";
}
