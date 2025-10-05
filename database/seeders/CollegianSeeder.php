<?php

namespace Database\Seeders;

use App\Models\Collegian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollegianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Collegian::create([
            'name' => 'reza',
            'phoneNumber' => '09185456325',
            'email' => 'reza@gmail.com',
            'age' => 22,
            'gender' => 'male',
        ]);

    }
}
