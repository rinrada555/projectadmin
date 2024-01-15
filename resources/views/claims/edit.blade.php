@extends('layouts.app')
  
@section('title', 'Edit Claim')
  
@section('contents')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h4 class="mb-0">เเก้ไขบริการเคลม</h4>
            <hr />
            <form action="{{ route('claims.update', $claim->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">รายการเคลม</label>
                    <input type="text" name="Claim_Name" class="form-control" placeholder="รายการเคลม"  value="{{ $claim->Claim_Name }}">
                </div>
                <div class="col">
                    <label class="form-label">ระยะเวลาการเคลม</label>
                    <input class="form-control" name="Total_Month" placeholder="ระยะเวลาเคลม"  value="{{ $claim->Total_Month }}"></input>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <button class="btn btn-primary">ตกลง</button>
                </div>
                <div class="col">
                    <a href="{{ route('claims') }}" class="btn btn-danger">ยกเลิก</a>
                </div>
            </div>
        </div>
        </form>
    </main>
    </div>
</div>
@endsection