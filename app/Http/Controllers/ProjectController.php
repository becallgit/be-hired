<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Project;
use App\Models\Company;
use App\Models\Work_Center;
use App\Models\User;
use Carbon\Carbon;
class ProjectController extends Controller
{
    public function form()
    {
        
        $companies = Company::all();
        $work_centers = Work_Center::all();
        $responsibles = User::where('role','responsible')->get();
        return view('project.form', compact('companies','work_centers','responsibles'));
    }
    
    public function save(Request $request)
    {
    
        $data = $request->except('_token');
        $project = Project::updateOrCreate($data);


        $companies = Company::all();
        $work_centers = Work_Center::all();
        $responsibles = User::where('role', 'responsible')->get();

    return view('project.form', compact('companies', 'work_centers', 'responsibles'));
    }
}
