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
        // User::factory(10)->create();

        $this->call([
            AppointStatusSeeder::class,
            ZoneSeeder::class,
            DistrictSeeder::class,
            DepartmentTypeSeeder::class,
            DepartmentSeeder::class,
            StationSeeder::class,
            RaceSeeder::class,
            UserSeeder::class,
            // NsSeeder::class,
            // NsBankSoalanSeeder::class,
            // NsRujukanSkorSeeder::class,
        ]);
    }
}
