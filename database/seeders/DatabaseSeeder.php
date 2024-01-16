<?php

namespace Database\Seeders;

use App\Models\Departement;
use App\Models\EmployeeStatus;
use App\Models\Jabatan;
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

        EmployeeStatus::create([
            "name" => "Karyawan Tetap"
        ]);

        EmployeeStatus::create([
            "name" => "Karyawan Percobaan"
        ]);

        EmployeeStatus::create([
            "name" => "Resign"
        ]);


        Departement::create([
            "code" => "UPDT",
            "name" => "Update",
            "status" => 1,
            "options" => "#FFFFF"
        ]);

        Departement::create([
            "code" => "BRD",
            "name" => "Branding",
            "status" => 1,
            "options" => "#FFFFF"
        ]);

        Departement::create([
            "code" => "GD",
            "name" => "Gudang",
            "status" => 1,
            "options" => "#FFFFF"
        ]);

        Departement::create([
            "code" => "HRD",
            "name" => "Human Resource",
            "status" => 1,
            "options" => "#FFFFF"
        ]);

        Departement::create([
            "code" => "IT",
            "name" => "Teknologi Informasi",
            "status" => 1,
            "options" => "#FFFFF"
        ]);

        Departement::create([
            "code" => "KSR",
            "name" => "Kasir",
            "status" => 1,
            "options" => "#FFFFF"
        ]);

        Departement::create([
            "code" => "MOF",
            "name" => "Marketing Offline",
            "status" => 1,
            "options" => "#FFFFF"
        ]);

        Departement::create([
            "code" => "MON",
            "name" => "Marketing Online",
            "status" => 1,
            "options" => "#FFFFF"
        ]);

        Departement::create([
            "code" => "RMA",
            "name" => "Return Merchandise Authorization",
            "status" => 1,
            "options" => "#FFFFF"
        ]);

        Departement::create([
            "code" => "FAT",
            "name" => "Finance Accounting & Tax",
            "status" => 1,
            "options" => "#FFFFF"
        ]);

        Departement::create([
            "code" => "TKS",
            "name" => "Teknisi",
            "status" => 1,
            "options" => "#FFFFF"
        ]);

        Departement::create([
            "code" => "MKB",
            "name" => "Marketing Komunikasi & Branding",
            "status" => 1,
            "options" => "#FFFFF"
        ]);

        Departement::create([
            "code" => "PU",
            "name" => "Pick Up",
            "status" => 1,
            "options" => "#FFFFF"
        ]);

        Departement::create([
            "code" => "PKG",
            "name" => "Packing",
            "status" => 1,
            "options" => "#FFFFF"
        ]);

        Departement::create([
            "code" => "SEC",
            "name" => "Keamanan",
            "status" => 1,
            "options" => "#FFFFF"
        ]);

        Departement::create([
            "code" => "CS",
            "name" => "Customer Service",
            "status" => 1,
            "options" => "#FFFFF"
        ]);

        Jabatan::create([
            "name" => "Owner",
            "status" => 1
        ]);

        Jabatan::create([
            "name" => "Director",
            "status" => 1
        ]);

        Jabatan::create([
            "name" => "Manager",
            "status" => 1
        ]);

        Jabatan::create([
            "name" => "Supervisor",
            "status" => 1
        ]);

        Jabatan::create([
            "name" => "Staff",
            "status" => 1
        ]);
    }
}
