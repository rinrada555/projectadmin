@extends('layouts.app')
  
@section('title', 'Create CatPart')
  
@section('contents')
<div id="layoutSidenav">
<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
    <h4 class="mb-0">เพิ่มอะไหล่</h4>
    <hr />
    <form action="{{ route('car_parts.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="CarPart_Name" class="form-control" placeholder="รายการอะไหล่">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="Unit_Price" id="unitPrice" class="form-control" placeholder="ราคาต่อหน่วย">
                <span id="unitPriceError" style="color: red;"></span>
            </div>
            <div class="col">
                <input class="form-control" name="Total_Part_Receive" id="totalPartReceive" placeholder="จำนวน"></input>
                <span id="totalPartReceiveError" style="color: red;"></span>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="CarPart_Lot" class="form-label">วันที่นำเข้า</label>
                <input type="date" class="form-control" name="CarPart_Lot" placeholder="วันที่นำเข้า">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="Total_Part_Reorder" class="form-control" placeholder="จำนวนขั้นต่ำที่ต้องสั่ง">
                <span id="ReorderError" style="color: red;"></span>
            </div>
        </div>
        <div class="row mb-3">
                        <div class="row">
                            <div class="col-1">
                                <button class="btn btn-primary">ตกลง</button>
                            </div>
                            <div class="col">
                                <a href="{{ route('car_parts') }}" class="btn btn-danger">ยกเลิก</a>
                            </div>
                        </div>
                    </div>
    </form>
    </main>
</div>
</div>
<script>
    function validateForm() {
        var unitPrice = document.getElementById('unitPrice').value;
        var totalPartReceive = document.getElementById('totalPartReceive').value;

        // Check if the values are numeric
        if (isNaN(unitPrice) || isNaN(totalPartReceive)) {
            document.getElementById('unitPriceError').innerText = "กรุณากรอกตัวเลขเท่านั้น";
            document.getElementById('totalPartReceiveError').innerText = "กรุณากรอกตัวเลขเท่านั้น";
            document.getElementById('ReorderError').innerText = "กรุณากรอกตัวเลขเท่านั้น";
            return false; // Prevent form submission
        } else {
            // Clear any previous error messages
            document.getElementById('unitPriceError').innerText = "";
            document.getElementById('totalPartReceiveError').innerText = "";
            document.getElementById('ReorderError').innerText = "";
            return true; // Allow form submission
        }
    }
</script>
@endsection
