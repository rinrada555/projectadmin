<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    protected $connection = 'mysql';
    use HasFactory;
    use SoftDeletes;

    protected $table = 'departments';
    protected $fillable = ['DepartmentType'];

    public function technicians()
    {
        return $this->hasMany(Technicain::class, 'id');
    }
}