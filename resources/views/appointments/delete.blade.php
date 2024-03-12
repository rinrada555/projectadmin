@extends('layouts.app')
  
@section('title', 'Home Product')
  
@section('contents')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">การนัดหมาย</h4>
                </div>
                
                <hr />
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('appointments') }}">รอการอนุมัติ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('approved') }}">อนุมัติแล้ว</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('delete') }}">ยกเลิกการนัด</a>
                        </li>
                    </ul>
                </div>
                <table class="table table-hover">
                    <thead style="background-color: #011D98; color: white;">
                        <tr>
                            <th class="w-10">เลขที่นัดหมาย</th>
                            <th class="w-20">ชื่อลูกค้า</th>
                            <th class="w-20">ข้อมูลรถ</th>
                            <th class="w-10">วันที่ขอนัด</th>
                            <th class="w-10">สถานะ</th>
                            <th class="w-10">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($notapprovedAppointments->count() > 0)
                            @foreach($notapprovedAppointments as $appointment)
                                <tr>
                                    <td class="align-middle">{{ $appointment->id }}</td>
                                    <!-- Assuming 'customer' and 'car' are relations in your Appointment model -->
                                    <td class="align-middle">{{ $appointment->customer->Fname }}</td>
                                    <td class="align-middle">{{ $appointment->car->Car_Model }}</td>
                                    <td class="align-middle">{{ $appointment->Appointment_Date }}</td>
                                    <td class="align-middle">{{ $appointment->statusAppointment->AppointmentType }}</td>
                                    
                                    <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('technicains.edit', $appointment->id)}}" type="button" class="btn btn-warning">อนุมัติการนัด</a>
                                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger m-0">ยกเลิกการนัด</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="6">ไม่มีรายการ</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection