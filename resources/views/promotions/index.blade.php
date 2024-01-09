@extends('layouts.app')
  
@section('title', 'Home Product')
  
@section('contents')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="mb-0">โปรโมชัน</h1>
                    <a href="{{ route('promotions.create') }}" class="btn btn-primary">เพิ่มโปรโมชัน</a>
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
                            <th class="w-20">รหัส</th>
                            <th class="w-20">ชื่อโปรโมชัน</th>
                            <th class="w-10">รายละเอียด</th>
                            <th class="w-10">วันที่เริ่ม</th>
                            <th class="w-10">วันที่สิ้นสุด</th>
                            <th class="w-10">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($promotion->count() > 0)
                            @foreach($promotion as $rs)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $rs->PromotionName}}</td>
                                    <td class="align-middle">{{ $rs->PromotionDetail}}</td>
                                    <td class="align-middle">{{ $rs->PromotionStartDate}}</td>
                                    <td class="align-middle">{{ $rs->PromotionEndDate}}</td>  
                                    <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('promotions.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                            <a href="{{ route('promotions.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('promotions.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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
                                <td class="text-center" colspan="6">Promotion not found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
