<?php

namespace Database\Seeders;

use App\Models\Band;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Band::factory()->count(5)->sequence(
            ['gender' => 'Metal'],
            ['gender' => 'Rock'],
            ['gender' => 'Pop'],
            ['gender' => 'Indie'],
            ['gender' => 'Hip Hop'],
        )->create();
    }
}
