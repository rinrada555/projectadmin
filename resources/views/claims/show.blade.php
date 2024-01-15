@extends('layouts.app')
  
@section('title', 'Show Claim')
  
@section('contents')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid">
        <h4 class="mb-0">ข้อมูลการเคลม</h4>
        <hr />
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">รายการเคลม</label>
                    <input type="text" name="Claim_Name" class="form-control" placeholder="รายการเคลม"  value="{{ $claim->Claim_Name }}" readonly>
                </div>
                <div class="col">
                    <label class="form-label">ระยะเวลาการเคลม</label>
                    <input class="form-control" name="Total_Month" placeholder="ระยะเวลาเคลม"  value="{{ $claim->Total_Month }}" readonly></input>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <a href="{{ route('claims.edit', $claim->id) }}" class="btn btn-primary">แก้ไข</a>
                </div>
                <div class="col">
                    <a href="{{ route('claims') }}" class="btn btn-danger">ยกเลิก</a>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection