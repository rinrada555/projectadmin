<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{

    protected $connection = 'mysql';
    use HasFactory;
    use SoftDeletes;

    protected $table = 'promotions';
    protected $fillable =[
        'Promotion_ID',
        'PromotionName',
        'PromotionDetail',
        'PromotionImage',
        'PromotionStartDate',
        'PromotionEndDate',
    ];
}
