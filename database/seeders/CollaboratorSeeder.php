<?php

namespace Database\Seeders;

use App\Models\Collaborator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class CollaboratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 5; $i++) {
            $collaborator = new Collaborator();
            $collaborator->name = $faker->name();
            $collaborator->slug = Str::slug($collaborator->name, '-');
            $collaborator->url_git = $faker->url();
            $collaborator->save();
        }
    }
}
