<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Notifications\Notifiable;

class Customer extends AuthenticatableUser implements Authenticatable
{
    use HasFactory, Notifiable;

    protected $connection = 'mysql';
    protected $guard = 'web'; // Change this to 'web'

    protected $fillable = [
        'Fname', 'Lname', 'AddressNo', 'AddressTambon', 'AddressAmpur', 'AddressProvince', 'AddressPostcode', 'Tel', 'email',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class, 'id');
    }

    public function update(array $attributes = [], array $options = [])
    {
        return parent::update($attributes, $options);
    }
}
