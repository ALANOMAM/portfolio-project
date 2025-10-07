<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $technologies = Technology::all();

        return view('technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    $validated = $request->validate([
    'name' => 'required|string|max:255',
    ]);

     Technology::create([
        'name' => $validated['name'],
    ]);

    return redirect()->route('technologies.index')->with('success', 'technology added.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {

    $validated = $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Update main technology fields
    $technology->update([
        'name' => $validated['name'],
    ]);

    return redirect()->route('technologies.index')->with('success', 'technology updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
     $technology->delete();
    return redirect()->route('technologies.index')->with('success', 'technology deleted.');
    }
}
