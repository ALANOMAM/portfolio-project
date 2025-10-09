<?php

// namespace App\Http\Controllers\Api;

// use App\Models\Project;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;

// class ProjectApiController extends Controller
// {
//     public function index()
//     {
//         //  return Project::all(); // or use a resource/collection later
//         return Project::with(['technologies'])->get(); //so that technology list is also exposed to react frontend
//     }

//     public function store(Request $request)
//     {
//         $data = $request->validate([
//             'title' => 'required|string|max:255',
//             'description' => 'required|string',
//         ]);

//         $project = Project::create($data);

//         return response()->json($project, 201);
//     }

//     public function show(Project $project)
//     {
//         //  return $project;
//         return $project->load('technologies'); //so that technology list is also exposed to react frontend
//     }

//     public function update(Request $request, Project $project)
//     {
//         $data = $request->validate([
//             'title' => 'required|string|max:255',
//             'description' => 'required|string',
//         ]);

//         $project->update($data);

//         return response()->json($project);
//     }

//     public function destroy(Project $project)
//     {
//         $project->delete();

//         return response()->json(null, 204);
//     }
// }

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Http\Controllers\Controller;

class ProjectApiController extends Controller
{
    public function index()
    {
        return Project::with(['technologies'])->get();
    }

    public function show(Project $project)
    {
        return $project->load('technologies');
    }

    public function store()
    {
        return response()->json(['message' => 'Not allowed'], 405);
    }

    public function update()
    {
        return response()->json(['message' => 'Not allowed'], 405);
    }

    public function destroy()
    {
        return response()->json(['message' => 'Not allowed'], 405);
    }
}
