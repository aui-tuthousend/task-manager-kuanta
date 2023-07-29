<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class adminUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('5656')
            ],
            [
                'name'=>'partnership',
                'email'=>'partnership@gmail.com',
                'role'=>'partnership',
                'password'=>bcrypt('5656')
            ],
            [
                'name'=>'operation',
                'email'=>'operation@gmail.com',
                'role'=>'operation',
                'password'=>bcrypt('5656')
            ]
        ];

        foreach ($userData as $key => $val){
            User::create($val);
        }
    }
}
