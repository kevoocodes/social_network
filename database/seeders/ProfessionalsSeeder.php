<?php

namespace Database\Seeders;

use App\Models\Professionals;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfessionalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Professionals::factory()
        ->count(7) // Specify the number of professionals you want to create
        ->create();
    }
}
