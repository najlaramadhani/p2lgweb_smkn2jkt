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
        Jabatan::create([
            "name" => "Owner",
            "status" => 1,
            "tier" => 1
        ]);

        Jabatan::create([
            "name" => "Director",
            "status" => 1,
            "tier" => 2
        ]);

        Jabatan::create([
            "name" => "Manager",
            "status" => 1,
            "tier" => 3
        ]);

        Jabatan::create([
            "name" => "Supervisor",
            "status" => 1,
            "tier" => 4
        ]);

        Jabatan::create([
            "name" => "Staff",
            "status" => 1,
            "tier" => 5
        ]);

        User::create([
            "fullname" => "Owner",
            "username" => "owner",
            "password" => bcrypt("owner123"),
            "image" => "",
            "role" => "owner",
            "id_jabatan" => 1
        ]);

        User::create([
            "fullname" => "Director",
            "username" => "director",
            "password" => bcrypt("director123"),
            "image" => "",
            "role" => "director",
            "id_jabatan" => 2
        ]);

        User::create([
            "fullname" => "Manager",
            "username" => "manager",
            "password" => bcrypt("manager123"),
            "image" => "",
            "role" => "manager",
            "id_jabatan" => 3
        ]);

        User::create([
            "fullname" => "Supervisor",
            "username" => "supervisor",
            "password" => bcrypt("supervisor123"),
            "image" => "",
            "role" => "supervisor",
            "id_jabatan" => 4
        ]);

        User::create([
            "fullname" => "Staff",
            "username" => "staff",
            "password" => bcrypt("staff123"),
            "image" => "",
            "role" => "staff",
            "id_jabatan" => 5
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
    }
}
