<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $table = 'promotions';
    protected $fillable =[
        'PromotinName',
        'PromotinDetail',
        'PromotionImage',
        'PromotionStartDate',
        'PromotionEndDate',
    ];
}
