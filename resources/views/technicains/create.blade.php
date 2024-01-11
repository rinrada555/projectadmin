@extends('layouts.app')
  
@section('title', 'Create Product')
  
@section('contents')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h4 class="mb-0">เพิ่มข้อมูลช่าง</h4>
                <hr/>
                <form action="{{ route('technicains.store') }}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" name="Tech_ID" class="form-control" placeholder="รหัสช่าง">
                    </div>
                </div>
                <div class="row mb-4">
                        <div class="col-6">
                        <select name="DepartmentID" class="form-select" aria-label="แผนก">
                            <option selected>เลือกแผนก...</option>
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->DepartmentType }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                <div class="row mb-4">
                    <div class="col">
                            <input type="text" name="Tech_Fname" class="form-control" placeholder="ชื่อ">
                    </div>
                    <div class="col">
                        <input type="text" name="Tech_Lname" class="form-control" placeholder="นามสกุล">
                    </div>
                </div>
                    <div class="row mb-4">
                        <div class="col">
                            <input type="text" name="Tech_Address" class="form-control" placeholder="ที่อยู่">
                        </div>
                        <div class="col">
                            <input class="form-control" name="Tech_Tel" placeholder="เบอร์โทร"></input>
                        </div>
                    </div>
                    
     
                    <div class="row">
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary">ตกลง</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection
