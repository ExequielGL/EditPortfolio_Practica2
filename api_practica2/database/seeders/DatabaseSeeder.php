<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\InterestSeeder;
use Database\Seeders\FrameworkSeeder;
use Database\Seeders\PersonalDataSeeder;
use Database\Seeders\SocialNetworkSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(InterestSeeder::class);
        $this->call(SocialNetworkSeeder::class);
        $this->call(PersonalDataSeeder::class);
        $this->call(FrameworkSeeder::class);

    }
}
