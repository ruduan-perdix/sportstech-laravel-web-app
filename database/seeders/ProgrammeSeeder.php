<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgrammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('programmes')->insert([
            [
                'name' => 'Strength Training',
                'description' => 'A 12-week strength-building programme.',
                'start_date' => '2025-09-01',
                'end_date' => '2025-11-24',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Endurance Challenge',
                'description' => 'Cardio-focused training for marathon prep.',
                'start_date' => '2025-09-15',
                'end_date' => '2025-12-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
