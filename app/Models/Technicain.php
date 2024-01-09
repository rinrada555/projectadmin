<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Technicain extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'technicains';
    protected $fillable =[
        'Tech_Fname',
        'Tech_Lname',
        'Tech_Address',
        'Tech_Tel',
        'DepartmentID'
    ];

    public function departments()
    {
        return $this->belongsTo(Department::class, 'DepartmentID', 'id');
    }

}
