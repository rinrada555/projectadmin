<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Appointment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'appointments'; // Update to the correct table name
    protected $fillable = [
        'Appointment_Date',
        'Appointment_Time',
        'CarImage',
        'CarID',
        'CustomerID',
        'AppointmentStatusID'
    ];

    public function statusAppointment()
    {
        return $this->belongsTo(StatusAppointment::class, 'AppointmentStatusID', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'CustomerID', 'id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'CarID', 'id');
    }
}