<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectApiController extends Controller
{
    public function index()
    {
        return Project::all(); // or use a resource/collection later
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $project = Project::create($data);

        return response()->json($project, 201);
    }

    public function show(Project $project)
    {
        return $project;
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $project->update($data);

        return response()->json($project);
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return response()->json(null, 204);
    }
}
