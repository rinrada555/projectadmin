<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateusersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'is_admin' => '1',
                'password' => bcrypt('Admin123456789')
            ],
            [
                'name' => 'User',
                'email' => 'User@user.com',
                'is_admin' => '0',
                'password' => bcrypt('1234')
            ]      
        ];
    
            foreach($user as $key => $value){
                User::create($value);
            }
        }
    }
    
