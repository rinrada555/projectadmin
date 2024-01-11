@extends('layouts.app')
  
@section('title', 'Show Technician')
  
@section('contents')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h4 class="mb-0">ข้อมูลช่าง</h4>
                <hr />
                <form>
                    @csrf
                    <div class="row mb-4">
                        <div class="col-2">
                            <label class="form-label">รหัสช่าง</label>
                            <input type="text" class="form-control" value="{{ $technicain->Tech_ID }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-6">
                            <label class="form-label">แผนก</label>
                            <input type="text" class="form-control" value="{{ $technicain->departments->DepartmentType }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" value="{{ $technicain->Tech_Fname }}" readonly >
                        </div>
                        <div class="col">
                            <label class="form-label">นามสกุล</label>
                            <input type="text" class="form-control" value="{{ $technicain->Tech_Lname }}" readonly >
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label class="form-label">ที่อยู่</label>
                            <input type="text" class="form-control" value="{{ $technicain->Tech_Address }}" readonly >
                        </div>
                        <div class="col">
                            <label class="form-label">เบอร์โทร</label>
                            <input class="form-control" value="{{ $technicain->Tech_Tel }}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">วันที่เพิ่ม</label>
                            <input type="text" class="form-control" value="{{ $technicain->created_at }}" readonly>
                        </div>
                        <div class="col">
                            <label class="form-label">อัปเดตล่าสุด</label>
                            <input type="text" class="form-control" value="{{ $technicain->updated_at }}" readonly>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-1">
                            <a href="{{ route('technicains.edit', $technicain->id) }}" class="btn btn-primary">แก้ไข</a>
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
@endsection
