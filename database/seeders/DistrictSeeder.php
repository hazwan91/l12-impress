<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = DB::connection('sm2viewlogin')->table('dbo.District')->select('DistrictDesc')->get();

        $zon_pantai_barat_selatan = ['Kota Kinabalu', 'Papar', 'Tuaran', 'Ranau', 'Penampang', 'Putatan'];
        $zon_pantai_barat_utara = ['Kota Belud', 'Kudat', 'Kota Marudu', 'Pitas', 'Paitan'];
        $zon_pedalaman_atas = ['Keningau', 'Papar', 'Tambunan', 'Nabawan', 'Tenom', 'Sook'];
        $zon_pedalaman_bawah = ['Beaufort', 'Kuala Penyu', 'Sipitang', 'Membakut'];
        $zon_sandakan = ['Sandakan', 'Beluran', 'Kinabatangan', 'Telupid', 'Tongod', 'Paitan'];
        $zon_tawau = ['Kalabakan', 'Tawau', 'Lahad Datu', 'Semporna', 'Kunak'];

        $zone_pantai_barat_selatan = Zone::query()->where('name', "Zon Pantai Barat Selatan")->first();
        $zone_pantai_barat_utara = Zone::query()->where('name', "Zon Pantai Barat Utara")->first();
        $zone_pedalaman_atas = Zone::query()->where('name', "Zon Pedalaman Atas")->first();
        $zone_pedalaman_bawah = Zone::query()->where('name', "Zon Pedalaman Bawah")->first();
        $zone_sandakan = Zone::query()->where('name', "Zon Sandakan")->first();
        $zone_tawau = Zone::query()->where('name', "Zon Tawau")->first();
        foreach ($districts as $district) {
            $districtDesc = Str::title(trim($district->DistrictDesc));
            if ($districtDesc === 'Labuk & Sugut/Beluran') {
                $districtDesc = 'Beluran';
            } elseif ($districtDesc === 'Nabawan/Pensiangan') {
                $districtDesc = 'Nabawan';
            } else {
                $districtDesc = $district->DistrictDesc;
            }
            $newdistrict = new District();
            if (in_array($districtDesc, $zon_pantai_barat_selatan)) {
                $newdistrict->zone_id = $zone_pantai_barat_selatan->id;
            }
            if (in_array($districtDesc, $zon_pantai_barat_utara)) {
                $newdistrict->zone_id = $zone_pantai_barat_utara->id;
            }
            if (in_array($districtDesc, $zon_pedalaman_bawah)) {
                $newdistrict->zone_id = $zone_pedalaman_bawah->id;
            }
            if (in_array($districtDesc, $zon_pedalaman_atas)) {
                $newdistrict->zone_id = $zone_pedalaman_atas->id;
            }
            if (in_array($districtDesc, $zon_sandakan)) {
                $newdistrict->zone_id = $zone_sandakan->id;
            }
            if (in_array($districtDesc, $zon_tawau)) {
                $newdistrict->zone_id = $zone_tawau->id;
            }
            $newdistrict->name = trim($districtDesc);
            $newdistrict->save();

        }
    }
}
