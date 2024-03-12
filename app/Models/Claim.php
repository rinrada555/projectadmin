<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Claim extends Model
{
    protected $connection = 'mysql';
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'Claim_Name',
        'Total_Month',
    ];
}
