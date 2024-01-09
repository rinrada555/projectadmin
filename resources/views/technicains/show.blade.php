@extends('layouts.app')
  
@section('title', 'Show Product')
  
@section('contents')

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid">
    <h1 class="mb-0">Edit Product</h1>
    <hr />
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">ชื่อ</label>
                <input type="text" name="Tech_Fname" class="form-control" placeholder="Title" value="{{ $technicain->Tech_Fname }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">นามสกุล</label>
                <input type="text" name="Tech_Lname" class="form-control" placeholder="Price" value="{{ $technicain->Tech_Lname }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">ที่อยู่</label>
                <input type="text" name="Tech_Address" class="form-control" placeholder="Product Code" value="{{ $technicain->Tech_Address }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">เบอร์โทร</label>
                <input class="form-control" name="Tech_Tel" placeholder="Descriptoin" value="{{ $technicain->Tech_Tel }}">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">ตกลง</button>
            </div>
        </div>
    <div class="row mt-4">
        <div class="col mb-3">
            <label class="form-label">วันที่เพิ่ม</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $technicain->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $technicain->updated_at }}" readonly>
        </div>
    </div>
    </main>
    </div>
</div>
@endsection