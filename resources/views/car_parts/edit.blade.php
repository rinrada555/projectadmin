@extends('layouts.app')

@section('title', 'Edit CatPart')

@section('contents')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h4 class="mb-0">แก้ไขอะไหล่</h4>
                <hr />
                <form action="{{ route('car_parts.update', $carpart->id) }}" method="POST" onsubmit="return validateForm()">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="form-label">รายการอะไหล่</label>
                        <div class="col">
                            <input type="text" name="CarPart_Name" class="form-control" placeholder="รายการอะไหล่" value="{{ $carpart->CarPart_Name }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">ราคาต่อหน่วย</label>
                            <input type="text" name="Unit_Price" id="unitPrice" class="form-control" placeholder="ราคาต่อหน่วย" value="{{ $carpart->Unit_Price }}">
                            <span id="unitPriceError" style="color: red;"></span>
                        </div>
                        <div class="col">
                            <label class="form-label">จำนวน</label>
                            <input class="form-control" name="Total_Part_Receive" id="totalPartReceive" placeholder="จำนวน" value="{{ $carpart->Total_Part_Receive }}"></input>
                            <span id="totalPartReceiveError" style="color: red;"></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="CarPart_Lot" class="form-label">วันที่นำเข้า</label>
                            <input type="date" class="form-control" name="CarPart_Lot" placeholder="วันที่นำเข้า" value="{{ $carpart->CarPart_Lot}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="Total_Part_Reorder" class="form-label">ขั้นต่ำที่ต้องสั่ง</label>
                            <input name="Total_Part_Reorder" id="reorder" class="form-control" placeholder="จำนวนขั้นต่ำที่ต้องสั่ง" value="{{ $carpart->Total_Part_Reorder}}">
                            <span id="reorderError" style="color: red;"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <button class="btn btn-primary">ตกลง</button>
                        </div>
                        <div class="col">
                            <a href="{{ route('car_parts') }}" class="btn btn-danger">ยกเลิก</a>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
<script>
    function validateForm() {
        var unitPrice = document.getElementById('unitPrice').value;
        var totalPartReceive = document.getElementById('totalPartReceive').value;
        var totalPartReorder = document.getElementsByName('Total_Part_Reorder')[0].value;

        // Check if the values are numeric
        if (isNaN(unitPrice) || isNaN(totalPartReceive) || isNaN(totalPartReorder)) {
            document.getElementById('unitPriceError').innerText = "กรุณากรอกตัวเลขเท่านั้น";
            document.getElementById('totalPartReceiveError').innerText = "กรุณากรอกตัวเลขเท่านั้น";
            document.getElementById('reorderError').innerText = "กรุณากรอกตัวเลขเท่านั้น";
            return false; // Prevent form submission
        } else {
            // Clear any previous error messages
            document.getElementById('unitPriceError').innerText = "";
            document.getElementById('totalPartReceiveError').innerText = "";
            document.getElementById('reorderError').innerText = "";
            return true; // Allow form submission
        }
    }
</script>

@endsection
