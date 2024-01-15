@extends('layouts.app')
  
@section('title', 'Show CatPart')
  
@section('contents')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">

    <h4 class="mb-0">ข้อมูลอะไหล่</h4>
    <hr />
    <form>
                    @csrf
        <div class="row mb-3">
        <label class="form-label">รายการอะไหล่</label>
        <div class="col">
                <input type="text" name="CarPart_Name" class="form-control" placeholder="รายการอะไหล่" value="{{ $carpart->CarPart_Name }}" readonly>
            </div>
</div>
<div class="row mb-3">
            <div class="col">
            <label class="form-label">ราคาต่อหน่วย</label>
                <input type="text" name="Unit_Price" class="form-control" placeholder="ราคาต่อหน่วย" value="{{ $carpart->Unit_Price }}" readonly>
            </div>
            <div class="col">
            <label class="form-label">จำนวน</label>
                <input class="form-control" name="Total_Part_Receive" placeholder="จำนวน" value="{{ $carpart->Total_Part_Receive }}" readonly></input>
            </div>
        </div>
        <div class="row mb-3">
        <div class="col">
        <label for="CarPart_Lot" class="form-label">วันที่นำเข้า</label>
            <input type="date" class="form-control" name="CarPart_Lot" placeholder="วันที่นำเข้า" value="{{ $carpart->CarPart_Lot}}" readonly>
        </div>
        </div>
        <div class="row mb-3">
            <div class="col">
            <label for="CarPart_Lot" class="form-label">ขั้นต่ำที่ต้องสั่ง</label>
                <input type="text" name="Total_Part_Reorder" class="form-control" placeholder="จำนวนขั้นต่ำที่ต้องสั่ง" value="{{ $carpart->Total_Part_Reorder}}" readonly>
            </div>
        </div>
    <div class="row mt-4">
        <div class="col mb-3">
            <label class="form-label">วันที่เพิ่ม</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $carpart->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">อัปเดทล่าสุด</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $carpart->updated_at }}" readonly>
        </div>
        <div class="row mt-4">
                        <div class="col-1">
                            <a href="{{ route('car_parts.edit', $carpart->id) }}" class="btn btn-primary">แก้ไข</a>
                        </div>
                        <div class="col">
                            <a href="{{ route('car_parts') }}" class="btn btn-danger">ยกเลิก</a>
                        </div>
                    </div>
    </div>
    </form>
</main>
</div>
@endsection