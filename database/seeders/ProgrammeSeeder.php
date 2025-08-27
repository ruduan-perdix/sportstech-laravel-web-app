<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgrammeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('programmes')->insert([
            [
                'id' => 1,
                'name' => 'Strength Training',
                'description' => 'A 12-week strength-building programme.',
                'start_date' => '2025-09-01',
                'end_date' => '2025-11-24',
            ],
            [
                'id' => 2,
                'name' => 'Endurance Challenge',
                'description' => 'Cardio-focused training for marathon prep.',
                'start_date' => '2025-09-15',
                'end_date' => '2025-12-15',
            ],
            [
                'id' => 3,
                'name' => 'Flexibility & Mobility',
                'description' => 'Improve flexibility with yoga and stretching routines.',
                'start_date' => '2025-10-01',
                'end_date' => '2025-11-01',
            ],
            [
                'id' => 4,
                'name' => 'Fat Burn Bootcamp',
                'description' => 'High-intensity circuits to maximize fat loss.',
                'start_date' => '2025-10-10',
                'end_date' => '2025-12-20',
            ],
        ]);
    }
}
