@extends('layouts.app')
  
@section('title', 'Edit Product')
  
@section('contents')
<div id="layoutSidenav">
<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
    <h1 class="mb-0">Edit Product</h1>
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
    </main>
</div>
</div>
@endsection