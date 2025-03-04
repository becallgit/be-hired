<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Project;
use App\Models\Company;
use App\Models\Work_Center;
use App\Models\User;
use App\Models\Training;

class TrainingController extends Controller
{
    public function form($id = null)
    {
        $training = $id ? Training::findOrFail($id) : new Training();
        $projects = Project::all();
        $companies = Company::all();
        $work_centers = Work_Center::all();
        $trainers = User::where('role','trainer')->get();
        $recruiters = User::where('role','reclutador')->get();
        return view('training.form', compact('training','projects','companies','work_centers','trainers','recruiters'));
    }
    
    public function save(Request $request)
    {
    
        
        $training = Training::updateOrCreate(
            ['id' => $request->id],
            $request->all()
        );
    
        return response()->json(['success' => true, 'message' => 'Datos guardados correctamente']);
    }
}
