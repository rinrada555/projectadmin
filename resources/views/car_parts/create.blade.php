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
            <label for="CarPart_Lot" class="form-label">รายการอะไหล่</label>
                <input type="text" name="CarPart_Name" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
            <label for="CarPart_Lot" class="form-label">ราคาต่อหน่วย</label>
                <input type="text" name="Unit_Price" id="unitPrice" class="form-control">
                <span id="unitPriceError" style="color: red;"></span>
            </div>
            <div class="col">
            <label for="CarPart_Lot" class="form-label">จำนวน</label>
                <input class="form-control" name="Total_Part_Receive" id="totalPartReceive"></input>
                <span id="totalPartReceiveError" style="color: red;"></span>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="CarPart_Lot" class="form-label">วันที่นำเข้า</label>
                <input type="date" class="form-control" name="CarPart_Lot">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
            <label for="CarPart_Lot" class="form-label">จำนวนขั้นต่ำที่ต้องสั่ง</label>
                <input type="text" name="Total_Part_Reorder" class="form-control" id="Reorder">
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
<!-- <script>
    function validateForm() {
        var unitPrice = document.getElementById('unitPrice').value;
        var totalPartReceive = document.getElementById('totalPartReceive').value;
        var ReorderError = document.getElementById('Reorder').value;

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
</script> -->

<script>
    function validateForm() {
        var unitPrice = document.getElementById('unitPrice').value;
        var totalPartReceive = document.getElementById('totalPartReceive').value;
        var reorderError = document.getElementById('Reorder').value;

        // Clear any previous error messages
        document.getElementById('unitPriceError').innerText = "";
        document.getElementById('totalPartReceiveError').innerText = "";
        document.getElementById('ReorderError').innerText = "";

        var errorCount = 0;

        // Check if the values are not numeric
        if (isNaN(unitPrice) || unitPrice.trim() === "") {
            document.getElementById('unitPriceError').innerText = "กรุณากรอกตัวเลขเท่านั้น";
            errorCount++;
        }

        if (isNaN(totalPartReceive) || totalPartReceive.trim() === "") {
            document.getElementById('totalPartReceiveError').innerText = "กรุณากรอกตัวเลขเท่านั้น";
            errorCount++;
        }

        if (isNaN(reorderError) || reorderError.trim() === "") {
            document.getElementById('ReorderError').innerText = "กรุณากรอกตัวเลขเท่านั้น";
            errorCount++;
        }

        // Prevent form submission if there are errors
        return errorCount === 0;
    }
</script>


@endsection
