<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PersonalDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('personal_data')->insert([
            'age' => 22,
            'email' => 'exequiel.gonzalez01@alumnos.ucn.cl',
            'origin_city' => 'Antofagasta',
            'origin_country' => 'Chile',
            'user_id' => 1, 
        ]);
    }
}
