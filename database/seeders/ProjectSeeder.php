<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        for ($i = 0; $i < 10; $i++) {
            $newProject = new Project();
            $newProject->name = $faker->word(5, true);
            $newProject->url = $faker->url();
            $newProject->slug = Str::slug($newProject->name);
            $newProject->start_date = date("Y-m-d");
            $newProject->finish_date = $faker->dateTimeBetween($newProject->start_date, '+3 days');
            $newProject->description = $faker->paragraph(2);
            $newProject->notes = $faker->paragraph(1);
            $newProject->status = rand(0, 2);
            $newProject->save();
        }
    }
}
