<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;

class PromotionController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotion = Promotion::orderBy('created_at', 'ASC')->get();
  
        return view('promotions.index', compact('promotion'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $promotions = Promotion::all();
        return view('promotions.create', compact('promotions'));
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $validatedData = $request->validate([
            'Promotion_ID' => 'required|max:4|unique:promotions',
            'PromotionName' => 'required',
            'PromotionDetail' => 'required',
            'PromotionImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'PromotionStartDate' => 'required|date',
            'PromotionEndDate' => 'required|date|after_or_equal:PromotionStartDate',
        ],[
            'Promotion_ID.unique' => 'ไม่สามารถใช้รหัสนี้ได้ รหัสนี้มีอยู่แล้วในระบบแล้ว' // ข้อความ error สำหรับการซ้ำ
        ]);

        $filename = time() . '.' . $request->file('PromotionImage')->getClientOriginalExtension();
        $request->file('PromotionImage')->move(public_path('asset/uploads/promotion/'), $filename);
        
        $promotion = new Promotion;
        $promotion->Promotion_ID = $request->Promotion_ID;
        $promotion->PromotionName = $request->PromotionName;
        $promotion->PromotionDetail = $request->PromotionDetail;
        $promotion->PromotionImage = $filename;
        $promotion->PromotionStartDate = $request->PromotionStartDate;
        $promotion->PromotionEndDate = $request->PromotionEndDate;

        $promotion->save();

        return redirect('promotions')->with('message','เพิ่มโปรโมชันเรียบร้อย');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        
        $promotion = Promotion::findOrFail($id);

        return view('promotions.show', compact('promotion'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $promotion = Promotion::findOrFail($id);

        return view('promotions.edit', compact('promotion'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $promotion = Promotion::findOrFail($id);

        $validatedData = $request->validate([
            'PromotionName' => 'required',
            'PromotionDetail' => 'required',
            'PromotionImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'PromotionStartDate' => 'required|date',
            'PromotionEndDate' => 'required|date|after_or_equal:PromotionStartDate',
        ]);

        if ($request->hasFile('PromotionImage')) {
            $filename = time() . '.' . $request->file('PromotionImage')->getClientOriginalExtension();
            $request->file('PromotionImage')->move(public_path('asset/uploads/promotion/'), $filename);
            $promotion->PromotionImage = $filename;
        }

        $promotion->PromotionName = $validatedData['PromotionName'];
        $promotion->PromotionDetail = $validatedData['PromotionDetail'];
        $promotion->PromotionStartDate = $validatedData['PromotionStartDate'];
        $promotion->PromotionEndDate = $validatedData['PromotionEndDate'];

        $promotion->save();

        return redirect()->route('promotions')->with('success', 'อัปเดตโปรโมชันเรียบร้อย');
    }

    public function destroy(string $id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();

        return redirect()->route('promotions')->with('success', 'ลบโปรโมชันเรียบร้อย');
    }
}