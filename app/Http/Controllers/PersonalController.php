<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Project;
use App\Models\Company;
use App\Models\Work_Center;
use App\Models\User;
use Carbon\Carbon;
class PersonalController extends Controller
{
    public function form($id = null)
    {
        $personal = $id ? Personal::findOrFail($id) : new Personal();
        $projects = Project::all();
        $companies = Company::all();
        $work_centers = Work_Center::all();
        $recruiters = User::where('role','reclutador')->get();
        return view('personal.form', compact('personal','projects','companies','work_centers','recruiters'));
    }
    
    public function save(Request $request)
    {
    
        
        $personal = Personal::updateOrCreate(
            ['id' => $request->id],
            $request->all()
        );
    
        return response()->json(['success' => true, 'message' => 'Datos guardados correctamente']);
    }
    
}
