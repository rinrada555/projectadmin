<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Claim;

class ClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $claim = Claim::orderBy('created_at', 'DESC')->get();
  
        return view('claims.index', compact('claim'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('claims.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Claim::create($request->all());
 
        return redirect()->route('claims')->with('success', 'เพิ่มบริการเคลมเรียบร้อย');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $claim = Claim::findOrFail($id);
  
        return view('claims.show', compact('claim'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $claim = Claim::findOrFail($id);
  
        return view('claims.edit', compact('claim'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $claim = Claim::findOrFail($id);
  
        $claim->update($request->all());
  
        return redirect()->route('claims')->with('success', 'อัปเดตบริการเคลมสำเร็จ');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $claim = Claim::findOrFail($id);
  
        $claim->delete();
  
        return redirect()->route('claims')->with('success', 'ลบบริการเคลมเรียบร้อย');
    }
}
