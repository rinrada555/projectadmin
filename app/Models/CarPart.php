<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class CarPart extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    protected $fillable = [
        'CarPart_Lot',
        'CarPart_Name',
        'Unit_Price',
        'Total_Part_Receive',
        'Total_Part_Left',
        'Total_Part_Reorder',
        'Part_Price'
    ];
}
