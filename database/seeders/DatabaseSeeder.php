<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\student;
use App\Models\city;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call([
        //     StudentSeeder::class
        // ]);

        student::factory()->count(50)->create();
        city::factory()->count(5)->create();

        
    }
}
