<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ProjectSeeder;
use Database\Seeders\TypeSeeder;
use Database\Seeders\TechnologySeeder;
use Database\Seeders\NoteSeeder;
use Database\Seeders\CollaboratorSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProjectSeeder::class,
            TypeSeeder::class,
            TechnologySeeder::class,
            NoteSeeder::class,
            CollaboratorSeeder::class

        ]);
    }
}
