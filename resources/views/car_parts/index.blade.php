@extends('layouts.app')
  
@section('title', 'Home CatPart')
  
@section('contents')
<div id="layoutSidenav">
<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="mb-0">คลังอะไหล่</h4>
        <a href="{{ route('car_parts.create') }}" class="btn btn-primary">เพิ่มอะไหล่</a>
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
                <th>รหัสอะไหล่</th>
                <th>รายการ</th>
                <th>ราคาต่อหน่วย</th>
                <th>จำนวน</th>
                <th>ขั้นต่ำที่ต้องสั่ง</th>
                <th>วันที่นำเข้า</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
             @if($carpart->count() > 0)
                @foreach($carpart as $rs)
                   <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->CarPart_Name }}</td>
                        <td class="align-middle">{{ $rs->Unit_Price }}</td>
                        <td class="align-middle {{ $rs->Total_Part_Receive < $rs->Total_Part_Reorder ? 'text-danger' : '' }}">
    {{ $rs->Total_Part_Receive }}
</td>
                        <td class="align-middle">{{ $rs->Total_Part_Reorder }}</td>
                        <td class="align-middle">{{ $rs->CarPart_Lot}}</td>  
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('car_parts.show', $rs->id) }}" type="button" class="btn btn-secondary">รายละเอียด</a>
                                <a href="{{ route('car_parts.edit', $rs->id)}}" type="button" class="btn btn-warning">แก้ไข</a>
                                <form action="{{ route('car_parts.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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
                    <td class="text-center" colspan="8">ไม่มีรายการ</td>
                </tr>
            @endif
        </tbody>
    </table>
    </div>
</main>
</div>
</div>
@endsection