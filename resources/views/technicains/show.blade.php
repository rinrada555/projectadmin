@extends('layouts.app')
  
@section('title', 'Show Product')
  
@section('contents')


    <div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
        <h1 class="mb-0">Detail Product</h1>
    <hr />
    <form action="{{ route('technicains.update', $technicain->id) }}" method="POST">
        @csrf
        @method('PUT')
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
        <div class="row mb-3">
    <div class="col">
        <label class="form-label">แผนก</label>
        <select name="DepartmentID" class="form-select" aria-label="แผนก">
            <option selected>เลือกแผนก...</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}" @if($department->id == $technicain->DepartmentID) selected @endif>{{ $department->DepartmentType }}</option>
            @endforeach
        </select>
    </div>
</div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
    <div class="row mt-4">
        <div class="col mb-3">
            <label class="form-label">วันที่เพิ่ม</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $technicain->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">แก้ไขล่าสุด</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $technicain->updated_at }}" readonly>
        </div>
    </div>
    </main>
    </div>
</div>
@endsection