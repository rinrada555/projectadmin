<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarPart;
use Carbon\Carbon;
use App\Notifications\LowInventoryNotification;

class CarPartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carpart = CarPart::orderBy('created_at', 'ASC')->get();
  
        return view('car_parts.index', compact('carpart'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('car_parts.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'CarPart_Name' => 'required',
            'Unit_Price' => 'required',
            'Total_Part_Receive' => 'required',
            'CarPart_Lot' => 'required|date', // ตรวจสอบว่าเป็นรูปแบบวันที่ที่ถูกต้อง
            'Total_Part_Reorder' => 'required|numeric',
        ]);

        $carPart = CarPart::create($validatedData);


        // if ($carPart->Total_Part_Receive < $carPart->Total_Part_Reorder) {
        //     // ส่ง Notification
        //     $carPart->notify(new LowInventoryNotification($validatedData['CarPart_Name']));
        // }
    
        // แปลงวันที่เป็นรูปแบบที่ถูกต้อง
        $validatedData['CarPart_Lot'] = Carbon::parse($validatedData['CarPart_Lot'])->toDateTimeString();
    
        // บันทึกข้อมูล
        //CarPart::create($validatedData);
    
        // ส่งผู้ใช้ไปที่หน้าที่ต้องการ
        return redirect()->route('car_parts')->with('success', 'เพิ่มรายการอะไหล่เรียบร้อย');
        //CarPart::create($request->all());
        //return redirect()->route('car_parts')->with('success', 'CarPart added successfully');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $carpart = CarPart::findOrFail($id);
        return view('car_parts.show', compact('carpart'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $carpart = CarPart::findOrFail($id);
  
        return view('car_parts.edit', compact('carpart'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $carpart = CarPart::findOrFail($id);

        $validatedData = $request->validate([
            'CarPart_Name' => 'required',
            'Unit_Price' => 'required',
            'Total_Part_Receive' => 'required',
            'CarPart_Lot' => 'required|date',
            'Total_Part_Reorder' => 'required|numeric',
        ]);
    
        if ($validatedData['Total_Part_Receive'] < $validatedData['Total_Part_Reorder']) {
            // ส่ง Notification
            $carpart->notify(new LowInventoryNotification($validatedData['CarPart_Name']));
        }

        // Additional validation if needed
    
        $carpart->update($validatedData);
    
        return redirect()->route('car_parts')->with('success', 'อัพเดทรายการอะไหล่สำเร็จ');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carpart = CarPart::findOrFail($id);
  
        $carpart->delete();
  
        return redirect()->route('car_parts')->with('success', 'ลบรายการอะไหล่เรียบร้อย');
    }
}
