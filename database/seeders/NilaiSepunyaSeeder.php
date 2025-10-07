<?php

namespace Database\Seeders;

use App\Models\NilaiSepunya;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NilaiSepunyaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ns = new NilaiSepunya();
        $ns->year = '2025';
        $ns->jumlah_penilai_min = '3';
        $ns->jumlah_penilai_max = '5';
        $ns->tarikh_mula = now()->month(-1);
        $ns->created_by = 1;
        $ns->updated_by = 1;
        $ns->save();
    }
}
