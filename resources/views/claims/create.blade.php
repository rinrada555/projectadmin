@extends('layouts.app')
  
@section('title', 'Create Claim')
  
@section('contents')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mb-0">เพิ่มบริการเคลม</h1>
                <hr />
                <form action="{{ route('claims.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="Claim_Name" class="form-control" placeholder="รายการเคลม">
                        </div>
                        <div class="col">
                            <input class="form-control" name="Total_Month" placeholder="ระยะเวลาเคลม"></input>
                        </div>
                    </div>
                    <div class="row mb-3">
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
            </div>
        </main>
    </div>
</div>
@endsection