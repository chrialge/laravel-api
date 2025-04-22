<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newUser = new User();
        $newUser->name = "Christian";
        $newUser->email = "chrialge.dev@gmail.com";
        $newUser->password = Hash::make("chrixx99");
        $newUser->save();
    }
}
