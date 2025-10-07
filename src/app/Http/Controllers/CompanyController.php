<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
    $companies = Company::all()->where('user_id', Auth::id());

    return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    $validated = $request->validate([
    'name' => 'required|string|max:255',
    'website' => 'nullable|string',
    'logo' => 'nullable|image',
    ]);

    $company = Company::create([
        'name' => $validated['name'],
        'website' => $validated['website'] ?? null,
        'user_id' => Auth::id(),
        // image and video will be handled separately
    ]);

    if ($request->hasFile('logo')) {
    $path = $request->file('logo')->store('company_images', 'public');
    $company->logo = $path;
    }

    $company->save();

    return redirect()->route('companies.index')->with('success', 'Company added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
    //Even if a user guesses a company ID in the URL, they shouldn't be able to view or modify others' companies.
        if ($company->user_id !== Auth::id()) {
          abort(403); // Forbidden
         }

        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
    //Even if a user guesses a company ID in the URL, they shouldn't be able to view or modify others' companies.
        if ($company->user_id !== Auth::id()) {
          abort(403); // Forbidden
         }

        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
    //Even if a user guesses a company ID in the URL, they shouldn't be able to view or modify others' companies.
        if ($company->user_id !== Auth::id()) {
          abort(403); // Forbidden
         }

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'website' => 'nullable|string',
        'logo' => 'nullable|image',
    ]);

    // Update main company fields
    $company->update([
        'name' => $validated['name'],
        'website' => $validated['website'] ?? null,
    ]);

    // logo (optional)
    if ($request->hasFile('logo')) {
        $path = $request->file('logo')->store('company_images', 'public');
        $company->logo = $path;
    }

    $company->save();

    return redirect()->route('companies.index')->with('success', 'Company updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
   //Even if a user guesses a company ID in the URL, they shouldn't be able to view or modify others' companies.     
        if ($company->user_id !== Auth::id()) {
          abort(403); // Forbidden
         }        
            $company->delete();
    return redirect()->route('companies.index')->with('success', 'company deleted.');
    
    }
}
