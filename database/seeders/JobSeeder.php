<?php

namespace Database\Seeders;

use App\Models\Jobs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //   Jobs::factory()->create([
        //     'title' => 'Test Seeder',
        //     'salary' => '50, 000',
        //     'hour' => '8'
        // ]);

        Jobs::factory(10)->create();
    }
}
