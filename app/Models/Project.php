<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'company',
        'name',
        'headquarters',
        'responsible',
        'personal_count',
        'start_date',
        'end_date'
    ];
   protected $table = "projects";
   
}
