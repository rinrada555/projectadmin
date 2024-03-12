<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'License_Plate',
        'Registration_Provice' ,
        'Car_Color',
        'Car_Make',
        'Car_Model',
        'Car_Year',
        'CarVIN',
        'Engine_Number',
        'CustomerID'
    ];

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'CustomerID', 'id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'id');
    }

}
