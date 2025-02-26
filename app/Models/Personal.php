<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'dni',
        'phone',
        'email',
        'address',
        'city',
        'ss',
        'birthdate',
        'iban',
        'marital_status',
        'studies',
        'last_employment',
        'disability',
        'project',
        'company',
        'work_center',
        'training',
        'joined_at',
        'trial_end_date',
        'recruiter',
        'inscripted_at',
        'selected',
        'trained',
        'joined',
        'trial_period',
        'position_changed',
        'position',
        'fired_at',
        'attachments'
    ];
   protected $table = "personal";

   
}
