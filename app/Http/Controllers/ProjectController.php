<?php

namespace App\Http\Controllers;

use App\Models\Project; // Important : pour utiliser le modèle Project
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    
    public function create()
    {
        return view('projects.create');
    }

     
    public function store(Request $request)
    {
       
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Project::create($request->all());

        return redirect()->route('projects.index')->with('success', 'Projet ajouté avec succès !');
    }

   
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $project = Project::findOrFail($id);
        $project->update($request->all());

        return redirect()->route('projects.index')->with('success', 'Projet mis à jour !');
    }

   
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Projet supprimé !');
    }
}