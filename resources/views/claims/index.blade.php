@extends('layouts.app')
  
@section('title', 'Home Product')
  
@section('contents')
<div id="layoutSidenav">
<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="mb-0">บริการเคลม</h4>
        <a href="{{ route('claims.create') }}" class="btn btn-primary">เพิ่มบริการเคลม</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead style="background-color: #011D98; color: white;">
            <tr>
                <th>#</th>
                <th>รหัสเคลม</th>
                <th>รายการเคลม</th>
                <th>ระยะเวลาการเคลม (เดือน)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
             @if($claim->count() > 0)
                @foreach($claim as $rs)
                   <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->Claim_Name }}</td>
                        <td class="align-middle">{{ $rs->Total_Month }}</td> 
                      
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('claims.show', $rs->id) }}" type="button" class="btn btn-secondary">รายละเอียด</a>
                                <a href="{{ route('claims.edit', $rs->id)}}" type="button" class="btn btn-warning">แก้ไข</a>
                                <form action="{{ route('claims.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">ลบ</button>
                                </form>
                            </div>
                        </td>
                    </tr> 
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">ไม่มีรายการ</td>
                </tr>
            @endif
        </tbody>
    </table>
    </div>
</main>
</div>
</div>
@endsection