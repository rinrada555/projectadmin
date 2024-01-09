@extends('layouts.app')
  
@section('title', 'Create Product')
  
@section('contents')
<div id="layoutSidenav">
<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
    <h1 class="mb-0">เพิ่มช่างของคุณ</h1>
    <hr />
    <form action="{{ route('technicains.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="Tech_Fname" class="form-control" placeholder="ชื่อ">
            </div>
            <div class="col">
                <input type="text" name="Tech_Lname" class="form-control" placeholder="นามสกุล">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="Tech_Address" class="form-control" placeholder="ที่อยู่">
            </div>
            <div class="col">
                <input class="form-control" name="Tech_Tel" placeholder="เบอร์โทร"></input>
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    </main>
</div>
</div>
@endsection