<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // - Fullname
        // - Username
        // - Password
        // - Profile
        // - Role

        User::create([
            "fullname" => "Administrator",
            "username" => "administrator",
            "password" => bcrypt("administrator123"),
            "image" => "",
            "role" => "administrator"
        ]);

        User::create([
            "fullname" => "Operator",
            "username" => "operator",
            "password" => bcrypt("operator123"),
            "image" => "",
            "role" => "operator"
        ]);

        User::create([
            "fullname" => "Visitor",
            "username" => "visitor",
            "password" => bcrypt("visitor123"),
            "image" => "",
            "role" => "visitor123"
        ]);
    }
}
