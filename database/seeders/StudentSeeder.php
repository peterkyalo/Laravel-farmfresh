<?php

namespace Database\Seeders;

use App\Models\Api\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create(['name'=>'peter', 'age'=> 23]);
        Student::create(['name'=>'john', 'age'=> 33]);
        Student::create(['name'=>'doe', 'age'=> 26]);
    }
}