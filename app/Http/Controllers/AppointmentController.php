<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Appointment;
use App\Models\StatusAppointment;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        $customer = Customer::find(Auth::id());
        $appointments = Appointment::orderBy('created_at', 'ASC')->get();
        $pendingAppointments = Appointment::where('AppointmentStatusID', 1)->orderBy('created_at', 'ASC')->get();
        $approvedAppointments = Appointment::where('AppointmentStatusID', 2)->orderBy('created_at', 'ASC')->get();
        $deleteAppointments = Appointment::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();



        return view('appointments.index', compact('customer', 'appointments', 'pendingAppointments', 'approvedAppointments', 'deleteAppointments'));
    }


    public function createForCar($carId)
    {
        $customer = Customer::find(Auth::id());
        // Retrieve the selected car based on the provided ID
        $cars = Car::findOrFail($carId);

        // Pass the car information to the appointments.create view
        return view('appointments.create', compact('customer', 'cars'));
    }
    public function store(Request $request)
    {

        // ตรวจสอบความถูกต้องของข้อมูลที่ส่งมา
        $request->validate([
            'Appointment_Date' => 'required|date',
            'Appointment_Time' => 'required',
            // 'CarID'=> 'required',
            // 'CustomerID'=> 'required',
            'CarImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $filename = time() . '.' . $request->file('CarImage')->getClientOriginalExtension();
        $request->file('CarImage')->move(public_path('asset/uploads/carAppo/'), $filename);

        $appointments = new Appointment;
        $appointments->Appointment_Date = $request->Appointment_Date;
        $appointments->Appointment_Time = $request->Appointment_Time;
        $appointments->CarImage = $filename;
        // $appointment->CustomerID = $request->CustomerID;
        // $appointment->CarID = $request->CarID;

        // ดึงข้อมูลลูกค้า
        $customer = Customer::find(Auth::id()); // หรือจะใช้ $request->CustomerID ก็ได้ตามความเหมาะสม

        // ดึงข้อมูลรถ
        $car = Car::findOrFail($request->input('CarID')); // หรือจะใช้ $request->CarID ก็ได้ตามความเหมาะสม

        // ผูกข้อมูลลูกค้าและรถกับการนัดหมาย
        $appointments->customer()->associate($customer);
        $appointments->car()->associate($car);

        $appointments->save();

        $appointments->update(['AppointmentStatusID' => 1]);


        return redirect()->route('appointments')->with('success', 'Appointment created successfully');
    }

    public function destroy($id)
    {
        // Find the appointment by ID
        $appointments = Appointment::findOrFail($id);

        // Delete the appointment
        $appointments->delete();

        // Redirect back with a success message
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully');
    }

    public function approved()
    {
        $customer = Customer::find(Auth::id());
        $appointments = Appointment::orderBy('created_at', 'ASC')->get();
        $pendingAppointments = Appointment::where('AppointmentStatusID', 1)->orderBy('created_at', 'ASC')->get();
        $approvedAppointments = Appointment::where('AppointmentStatusID', 2)->orderBy('created_at', 'ASC')->get();
        $deleteAppointments = Appointment::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();

        return view('appointments.approved', compact('customer', 'appointments', 'pendingAppointments', 'approvedAppointments', 'deleteAppointments'));
    }
    public function delete()
    {
        $customer = Customer::find(Auth::id());
        $appointments = Appointment::orderBy('created_at', 'ASC')->get();
        //$pendingAppointments = Appointment::where('AppointmentStatusID', 1)->orderBy('created_at', 'ASC')->get();
        //$approvedAppointments = Appointment::where('AppointmentStatusID', 2)->orderBy('created_at', 'ASC')->get();
        $notapprovedAppointments = Appointment::whereIn('AppointmentStatusID', [3, 4])->orderBy('created_at', 'ASC')->get();
       // $deleteAppointments = Appointment::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();

        return view('appointments.delete', compact('customer', 'appointments','notapprovedAppointments'));
    }

    public function show(string $id)
    {
        // ค้นหาข้อมูลลูกค้า
        $customer = Customer::find(Auth::id());

        // ค้นหาข้อมูลการนัดหมายตาม ID
        $appointment = Appointment::findOrFail($id);

        // ดึงข้อมูลรถของการนัดหมาย
        $cars = $appointment->car;

        // ค้นหาข้อมูลการนัดหมายทั้งหมด
        $appointments = Appointment::orderBy('created_at', 'ASC')->get();

        // ค้นหาข้อมูลการนัดหมายที่รอดำเนินการ
        $pendingAppointments = Appointment::where('AppointmentStatusID', 1)->orderBy('created_at', 'ASC')->get();

        // ค้นหาข้อมูลการนัดหมายที่อนุมัติแล้ว
        $approvedAppointments = Appointment::where('AppointmentStatusID', 2)->orderBy('created_at', 'ASC')->get();

        // ค้นหาข้อมูลการนัดหมายที่ถูกลบ
        $deleteAppointments = Appointment::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();

        // ส่งข้อมูลไปยังหน้ารายละเอียดการนัดหมาย
        return view('appointments.detail', compact('customer', 'appointment', 'cars', 'appointments', 'pendingAppointments', 'approvedAppointments', 'deleteAppointments'));
    }

    //อนุมัติการนัดหมาย
    public function approveAppointment($id)
    {
        // ค้นหาข้อมูลการนัดหมายตาม ID
        $appointment = Appointment::findOrFail($id);

        // อัปเดตสถานะการนัดหมายเป็น 2 (สถานะที่อนุมัติแล้ว)
        $appointment->update(['AppointmentStatusID' => 2]);

        // Redirect ไปยังหน้าที่ต้องการด้วยข้อความแจ้งเตือน
        return redirect()->route('appointments')->with('success', 'Appointment approved successfully');
    }

    //ไม่อนุมัติการนัดหมาย
    public function notapproveAppointment($id)
    {
        // ค้นหาข้อมูลการนัดหมายตาม ID
        $appointment = Appointment::findOrFail($id);

        // อัปเดตสถานะการนัดหมายเป็น 2 (สถานะที่อนุมัติแล้ว)
        $appointment->update(['AppointmentStatusID' => 4]);

        // Redirect ไปยังหน้าที่ต้องการด้วยข้อความแจ้งเตือน
        return redirect()->route('appointments')->with('success', 'Appointment approved successfully');
    }
}
