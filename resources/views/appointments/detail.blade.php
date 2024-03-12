@extends('layouts.app')

@section('title', 'Home Product')

@section('contents')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">

        <main>
            <div class="container-fluid">
                <h4 class="mb-0">ลูกค้าขอนัดหมาย</h4>
                <hr />
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header bg-warning text-black" data-toggle="collapse" data-target="#user" aria-expanded="false" aria-controls="user">
                                    ลูกค้าขอนัดหมาย
                                </div>
                                <div class="card-body collapse show" id="user">
                                    <input type="hidden" name="CustomerID" value="{{ $customer->id }}">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="Cars" style="color: black;"><strong>ชื่อ</strong></label>
                                            <p>{{ $customer->Fname }}</p>
                                        </div>
                                        <div class="col">
                                            <label for="Cars" style="color: black;"><strong>นามสกุล</strong></label>
                                            <p>{{ $customer->Lname }}</p>
                                        </div>
                                        <div class="col">
                                            <label for="Cars" style="color: black;"><strong>เบอร์โทร</strong></label>
                                            <p>{{ $customer->Tel }}</p>
                                        </div>
                                        <div class="col">
                                            <label for="Cars" style="color: black;"><strong>ทะเบียนรถ</strong></label>
                                            <p>{{ $cars->License_Plate }}</p>
                                        </div>
                                        <div class="col">
                                            <label for="Cars" style="color: black;"><strong>ยี่ห้อรถ</strong></label>
                                            <p>{{ $cars->Car_Model }}</p>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label for="Cars" style="color: black;"><strong>รุ่นรถ</strong></label>
                                                <p>{{ $cars->Car_Make }}</p>
                                            </div>
                                            <div class="col">
                                                <label for="Cars" style="color: black;"><strong>สีรถ</strong></label>
                                                <p>{{ $cars->Car_Color }}</p>
                                            </div>
                                            <div class="col">
                                                <label for="Cars" style="color: black;"><strong>ปีรถ</strong></label>
                                                <p>{{ $cars->Car_Year }}</p>
                                            </div>
                                            <div class="col">
                                                <label for="Cars" style="color: black;"><strong>เลขตัวถัง</strong></label>
                                                <p>{{ $cars->CarVIN}}</p>
                                            </div>
                                            <div class="col">
                                                <label for="Cars" style="color: black;"><strong>เลขเครื่องยนต์</strong></label>
                                                <p>{{ $cars->Engine_Number}}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-2">
                                                <label for="Cars" style="color: black;"><strong>วันที่ขอนัด</strong></label>
                                                <p>{{ $appointment->Appointment_Date}}</p>
                                            </div>
                                            <div class="col">
                                                <label for="Cars" style="color: black;"><strong>เวลาที่ขอนัด</strong></label>
                                                <p>{{ $appointment->Appointment_Time}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card mb-3">
                                        <div class="card-header bg-primary text-black" data-toggle="collapse" data-target="#image" aria-expanded="false" aria-controls="image">
                                            รูปภาพ
                                        </div>
                                        <div class="card-body collapse show" id="image">
                                            <input type="hidden" name="CustomerID" value="{{ $customer->id }}">
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <img src="{{ asset('asset/uploads/carAppo/' . $appointment->CarImage) }}" alt="Car Image" style="width: 100px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    <form action="{{ route('appointments.approve', ['id' => $appointment->id]) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-primary">อนุมัติ</button>
                                    </form>
                                </div>
                                <div class="col">
                                    <form action="{{ route('appointments.notapprove', ['id' => $appointment->id]) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-primary">ไม่อนุมัติ</button>
                                    </form>
                                    <!-- <a href="" class="btn btn-danger">ไม่อนุมัติ</a> -->
                                </div>
                            </div>

                        </div>
                    </div>
        </main>
    </div>
</div>
@endsection