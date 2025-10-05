<?php

namespace Database\Seeders;

use App\Models\Professor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Professor::create([
            'name' => 'ali',
            'phoneNumber' => '09185966325',
            'email' => 'ali@gmail.com',
            'age' => 46,
            'gender' => 'male',
        ]);

    }
}
