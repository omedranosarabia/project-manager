<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function getAllProjects()
    {
        $projects = Project::all();
        return $projects;
    }

    public function getLastTenProjects()
    {

        $projects = Project::take(10)->get();
        return $projects;
    }

    public function getByChunk()
    {

        Project::chunk(200, function ($projects) {
            foreach ($projects as $project) {
                //Aquí escribimos lo que haremos con los datos (operar, modificar, etc)
            }
        });
    }

    public function insertProject(Request $request)
    {

        // $project = new Project;
        // $project->name = 'Nombre del proyecto';
        // $project->save();

        // $project = new Project;
        // $project->city_id = 1;
        // $project->company_id = 1;
        // $project->user_id = 1;
        // $project->name = 'Nombre del proyecto';
        // $project->execution_date = '2020-04-30';
        // $project->is_active = 1;
        // $project->save();
        
        $project = new Project;
        $project->city_id = $request->cityId;
        $project->company_id = $request->companyId;
        $project->user_id = $request->userId;
        $project->name = $request->name;
        $project->execution_date = $request->executionDate;
        $project->is_active = $request->isActive;
        $project->save();
        return "Guardado";
    }
}
