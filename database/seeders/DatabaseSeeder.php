<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Status;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Status::factory()
            ->hasPosts(100)
            ->create([
                'name' => 'to_do',
                'label' => 'To Do',
            ]);

        Status::factory()
            ->hasPosts(100)
            ->create([
                'name' => 'in_progress',
                'label' => 'In Progress',
            ]);

        Status::factory()
            ->hasPosts(100)
            ->create([
                'name' => 'done',
                'label' => 'Done',
            ]);
    }
}
