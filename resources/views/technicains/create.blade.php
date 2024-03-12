@extends('layouts.app')
  
@section('title', 'Create Product')
  
@section('contents')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h4 class="mb-0">เพิ่มข้อมูลช่าง</h4>
                <hr/>
                <form action="{{ route('technicains.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @csrf
                <div class="row mb-4">
                    <div class="col-2">
                    <label class="form-label">รหัสช่าง</label>
                            <input type="text" name="Tech_ID" class="form-control" id="Tech_ID">
                    </div>
                </div>
                <div class="row mb-4">
                        <div class="col-6">
                        <label class="form-label">แผนก</label>
                        <select name="DepartmentID" class="form-select" aria-label="แผนก" id="DepartmentID">
                            <option selected>เลือกแผนก...</option>
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->DepartmentType }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                <div class="row mb-4">
                    <div class="col">
                    <label class="form-label">ชื่อ</label>
                            <input type="text" name="Tech_Fname" class="form-control" id="Tech_Fname">
                    </div>
                    <div class="col">
                    <label class="form-label">นามสกุล</label>
                        <input type="text" name="Tech_Lname" class="form-control" id="Tech_Lname">
                    </div>
                </div>
                    <div class="row mb-4">
                        <div class="col">
                        <label class="form-label">ที่อยู่</label>
                            <input type="text" name="Tech_Address" class="form-control" id="Tech_Address">
                        </div>
                        <div class="col">
                        <label class="form-label">เบอร์โทร</label>
                            <input class="form-control" name="Tech_Tel" id="Tech_Tel"></input>
                        </div>
                    </div>
                    
     
                    <div class="row">
                        <div class="col-1">
                            <button type="submit" class="btn btn-primary">ตกลง</button>
                        </div>
                        <div class="col">
                                <a href="{{ route('technicains') }}" class="btn btn-danger">ยกเลิก</a>
                            </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

<script>
    function validateForm() {
        var fname = document.getElementById('Tech_ID').value;
        var fname = document.getElementById('DepartmentID').value;
        var fname = document.getElementById('Tech_Fname').value;
        var lname = document.getElementById('Tech_Lname').value;
        var fname = document.getElementById('Tech_Address').value;
        var fname = document.getElementById('Tech_Tel').value;
        // เพิ่มตรวจสอบข้อมูลอื่นๆ ตามต้องการ

        if (!fname || !lname) {
            alert('กรุณากรอกข้อมูลให้ครบ');
            return false;
        }

        return true;
    }
</script>

@endsection
