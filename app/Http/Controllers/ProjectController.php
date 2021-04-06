<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use PHPUnit\Util\Json;

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

    public function updateProject()
    {

        Project::where('is_active', 0)
            ->update(['name' => 'Proyecto aeroespacial']);

        //Actualizar proyecto
        // $project = Project::find(2);
        // $project->name = 'Proyecto de tecnología';
        // $project->save();

        //Actualizar la fecha de ejecución de todos los 
        //proyectos que estén activos y que además tengan 
        //el id de ciudad igual a 4

        // Project::where('is_active', 1)
        //     ->where('city_id', 4)
        //     ->update(['execution_date' => '2020-02-03']);

        return "Actualizado";
    }

    public function deleteProject()
    {
        // Se busca el proyecto y se elimina

        // $project = Project::find(1);
        // $project->delete();

        //Eliminación directa mediante valor o arrays
        // Project::destroy(1);
        // Project::destroy(1, 2, 3);
        // Project::destroy([1, 2, 3]);

        //Elminar proyecto según condición
        // Project::where('is_active', 0)->delete();

        $project = Project::where('project_id', '>', 15)->delete();
        return "Registros eliminados";
    }
    
    public function deleteFirstTenProjects()
    {
        Project::take(10)->delete();

        return "Registros eliminados";
    }

    public function getActive(){
        $projects = Project::active()->get();

        return response()->json([$projects]);
    }
}
