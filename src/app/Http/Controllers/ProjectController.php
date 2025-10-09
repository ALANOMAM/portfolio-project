<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    // $projects = Project::all();
    // $projects = Project::with('technologies')->get(); // eager load

    //eager loading plus each user only sees his/her projects
        $projects = Project::with('technologies')
        ->where('user_id', Auth::id())
        ->get();

    return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
 
        $categories = Category::all();
        $technologies = Technology::all();

        return view('projects.create', compact('categories','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    $validated = $request->validate([
    'title' => 'required|string|max:255',
    'description' => 'required|string',
    'category_id' => 'nullable|exists:categories,id',
    'project_link' => 'nullable|string',
    'image' => 'nullable|image',
    'video' => 'nullable|file|mimes:mp4,avi,mov', // adjust as needed
    'technologies' => 'nullable|array',
    'technologies.*' => 'exists:technologies,id',
    ]);

    // Project::create($validated);

    $project = Project::create([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'category_id' => $validated['category_id'] ?? null,
        'project_link' => $validated['project_link'] ?? null,
        'user_id' => Auth::id(),
        // image and video will be handled separately
    ]);

    if ($request->hasFile('image')) {
    $path = $request->file('image')->store('project_images', ['disk' => 'minio','visibility' => 'public']);   
    logger()->info("Image stored at: " . $path); // log info at "storage/logs/laravel.log" 
    $project->image = $path;
    }

    if ($request->hasFile('video')) {
    $path = $request->file('video')->store('project_videos', ['disk' => 'minio','visibility' => 'public']);
    logger()->info("Video stored at: " . $path); // log info at "storage/logs/laravel.log"       
    $project->video = $path;
    }

    $project->save();

    // Attach technologies if any selected
    if ($request->has('technologies')) {
        $project->technologies()->attach($request->input('technologies'));
    }

    return redirect()->route('projects.index')->with('success', 'Project created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        
    //Even if a user guesses a project ID in the URL, they shouldn't be able to view or modify others' projects.
        if ($project->user_id !== Auth::id()) {
          abort(403); // Forbidden
         }

        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
    //Even if a user guesses a project ID in the URL, they shouldn't be able to view or modify others' projects.
        if ($project->user_id !== Auth::id()) {
          abort(403); // Forbidden
         }

        $categories = Category::all();
        $technologies = Technology::all();
        return view('projects.edit', compact('project', 'categories','technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Project $project)
{

    //Even if a user guesses a project ID in the URL, they shouldn't be able to view or modify others' projects.
        if ($project->user_id !== Auth::id()) {
          abort(403); // Forbidden
         }

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'category_id' => 'nullable|exists:categories,id',
        'project_link' => 'nullable|string',
        'image' => 'nullable|image',
        'video' => 'nullable|file|mimes:mp4,avi,mov',
        'technologies' => 'nullable|array',
        'technologies.*' => 'exists:technologies,id',
    ]);

    // Update main project fields
    $project->update([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'category_id' => $validated['category_id'] ?? null,
        'project_link' => $validated['project_link'] ?? null,
    ]);

    // Replace image, if the user uploaads a new image the old MinIO image will be deleted
    if ($request->hasFile('image')) {
        if ($project->image) {
        Storage::disk('minio')->delete($project->image);
        }
        $path = $request->file('image')->store('project_images', ['disk' => 'minio', 'visibility' => 'public']);
        $project->image = $path;
    }

    // Replace video, if the user uploaads a new image the old MinIO video will be deleted
    if ($request->hasFile('video')) {
        if ($project->video) {
            Storage::disk('minio')->delete($project->video);
        }
        $path = $request->file('video')->store('project_videos', ['disk' => 'minio', 'visibility' => 'public']);
        $project->video = $path;
    }

    $project->save();

    // Sync technologies
    $project->technologies()->sync($request->input('technologies', []));

    return redirect()->route('projects.index')->with('success', 'Project updated.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
   //Even if a user guesses a project ID in the URL, they shouldn't be able to view or modify others' projects.     
        if ($project->user_id !== Auth::id()) {
          abort(403); // Forbidden
         }

  //When deleting a project, clean up the associated image files from MinIO       
        if ($project->image) {
            Storage::disk('minio')->delete($project->image);
        }
  //When deleting a project, clean up the associated video files from MinIO 
        if ($project->video) {
            Storage::disk('minio')->delete($project->video);
        }

     $project->delete();
    return redirect()->route('projects.index')->with('success', 'Project deleted.');
    }
}
