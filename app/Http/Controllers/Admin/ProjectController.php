<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', [
            "projects"=>$projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //Recupero un array con tutte le tipologie del mio db
        $types = Type::all();
        return view("admin.projects.create", compact("types"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data= $request->validated();

        //Nella tabella mi creo una nuova riga con i dati che sono appena rrivati dal creat/form
        $project= Project::create($data);
        $project->save();


        return redirect()->route("admin.projects.show", $project->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project= Project::findOrFail($id);

        return view("admin.projects.show", [
            "project"=>$project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project= Project::findOrFail($id);
        $types = Type::all();
        //Recuper un array con tutte le tecnologie nel mio db
        $technologies = Technology::all();



        return view("admin.projects.edit", [
            "project"=>$project,
            "types"=>$types,
            "technologies"=>$technologies
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        //validatedusa le validazioni/regole che ho indicato nello StoreProjectRequest
        $data = $request->validated();

        $data = $request->all();

        $project= Project::findOrFail($id);

        $project->update($data);

        // la funzione sync si arrangia a capire quali sono le tecnologie da aggiungere,
        // quali da togliere e quali da lasciare invariati
        $project->technologies()->sync($data["technologies"]);

        return redirect()->route("admin.projects.show", compact("id","project"));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route("admin.projects.index");
    }
}
