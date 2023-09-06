<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProjectRequest;
use Illuminate\Http\Request;
use App\Models\Tecnology;
use App\Models\Type;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tecnologies = Tecnology::all();
        $types = Type::all();

        return view('admin.projects.create', compact('types', 'tecnologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();
        
        $project = new Project();
        $project->fill($form_data);
        //dd($form_data);
        if ($request->hasFile('thumb')) {
            $path = $request->file('thumb')->store('thumb');
            $project->thumb = $path;
        }
        
        $project->save();

        if ($request->has('technologies')){
    
            $project->tecnologies()->attach($request->technologies);
        }

        

               
        
        return redirect()->route('admin.projects.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $tecnologies = Tecnology::all();
        $types = Type::all();
        return view('admin.projects.show', compact('project', 'types', 'tecnologies'));;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $tecnologies = Tecnology::all();
        $types = Type::all();

        return view('admin.projects.edit', compact('project','types', 'tecnologies'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $form_data = $request->all();
        $project->update($form_data);
        
        if ($request->hasFile('thumb')) {
            Storage::delete($project->thumb);
            $path = $request->file('thumb')->store('thumb');
            $project->thumb = $path;
        }

        if ($request->has('technologies')) {
            $selectedTecnologies = $request->input('technologies');
            $project->tecnologies()->sync($selectedTecnologies);
        } else {
            $project->tecnologies()->detach();
        }
        
        $project->save();

        return redirect()->route('admin.projects.index');

        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');

    }
}