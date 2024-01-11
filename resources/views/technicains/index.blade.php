@extends('layouts.app')
  
@section('title', 'Home Product')
  
@section('contents')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">ข้อมูลช่าง</h4>
                    <a href="{{ route('technicains.create') }}" class="btn btn-primary">เพิ่มข้อมูลช่าง</a>
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
                            <th class="w-10">รหัส</th>
                            <th class="w-20">ชื่อ</th>
                            <th class="w-20">นามสกุล</th>
                            <th class="w-10">ที่อยู่</th>
                            <th class="w-10">เบอร์โทร</th>
                            <th class="w-10">แผนก</th>
                            <th class="w-10">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($technicain->count() > 0)
                            @foreach($technicain as $rs)
                                <tr>
                                    <td class="align-middle">{{ $rs->Tech_ID }}</td>
                                    <td class="align-middle">{{ $rs->Tech_Fname }}</td>
                                    <td class="align-middle">{{ $rs->Tech_Lname }}</td>
                                    <td class="align-middle">{{ $rs->Tech_Address }}</td>
                                    <td class="align-middle">{{ $rs->Tech_Tel }}</td>  
                                    <td class="align-middle">
                                        @if($rs->departments)
                                            {{ $rs->departments->DepartmentType }}
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('technicains.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                            <a href="{{ route('technicains.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('technicains.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger m-0">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="5">Product not found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
