<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $user = User::create([
        //     'name'=>'superadmin',
        //     'email'=>'superadmin@gmail.com',
        //     'email_verified_at'=> now(),
        //     'password'=> bcrypt('password'),//password
        // ]);
        // $user->assignRole(['farmer', 'admin']);
        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'email_verified_at'=> now(),
            'password'=> bcrypt('password'),//password
        ])->assignRole('farmer', 'admin');
    }
}
