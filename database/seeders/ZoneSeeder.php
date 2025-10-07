<?php

namespace Database\Seeders;

use App\Models\Zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $zone = new Zone();
        $zone->name = "Zon Pantai Barat Selatan";
        $zone->color = '#FAD201';
        $zone->save();

        $zone = new Zone();
        $zone->name = "Zon Pantai Barat Utara";
        $zone->color = '#FAD201';
        $zone->save();

        $zone = new Zone();
        $zone->name = "Zon Pedalaman Atas";
        $zone->color = '#FAD201';
        $zone->save();

        $zone = new Zone();
        $zone->name = "Zon Pedalaman Bawah";
        $zone->color = '#FAD201';
        $zone->save();

        $zone = new Zone();
        $zone->name = "Zon Sandakan";
        $zone->color = '#FAD201';
        $zone->save();

        $zone = new Zone();
        $zone->name = "Zon Tawau";
        $zone->color = '#FAD201';
        $zone->save();
    }
}
