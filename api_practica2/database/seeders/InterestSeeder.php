<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('interests')->insert([
            'activity' => 'Pasear con mi mascota',
            'user_id' => 1, 
        ]);
        DB::table('interests')->insert([
            'activity' => 'Jugar videojuegos',
            'user_id' => 1, 
        ]);
        DB::table('interests')->insert([
            'activity' => 'Dormir',
            'user_id' => 1, 
        ]);
        DB::table('interests')->insert([
            'activity' => 'Estudiar',
            'user_id' => 1, 
        ]);
        DB::table('interests')->insert([
            'activity' => 'Conducir',
            'user_id' => 1, 
        ]);
    }
}
