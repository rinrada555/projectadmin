<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technicain;
use App\Models\Department;

class TechnicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technicain = Technicain::orderBy('created_at', 'DESC')->get();
        $departments = Department::all();
  
        return view('technicains.index', compact('technicain','departments'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('technicains.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Tech_Fname' => 'required|max:255',
            'Tech_Lname' => 'required|max:255',
            'Tech_Address' => 'required|max:255',
            'Tech_Tel' => 'required|max:10',
            
        ]);
    
        Technicain::create($validatedData);
 
        return redirect()->route('technicains')->with('success', 'Product added successfully');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $technicain = Technicain::findOrFail($id);
  
        return view('technicains.show', compact('technicain'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $technicain = Technicain::findOrFail($id);
  
        return view('technicains.edit', compact('technicain'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $technicain = Technicain::findOrFail($id);
  
        $technicain->update($request->all());
  
        return redirect()->route('technicains')->with('success', 'product updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $technicain = Technicain::findOrFail($id);
  
        $technicain->delete();
  
        return redirect()->route('technicains')->with('success', 'product deleted successfully');
    }
}

