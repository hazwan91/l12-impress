<?php

namespace Database\Seeders;

use App\Models\NilaiSepunya;
use App\Models\NsScoreReference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NsScoreReferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ns = NilaiSepunya::query()->where('year', '=', '2025')->firstOrFail();

        $nsRujukanSkor = new NsScoreReference();
        $nsRujukanSkor->ns_id = $ns->id;
        $nsRujukanSkor->skor_penilaian_intervensi_dari = '5';
        $nsRujukanSkor->skor_penilaian_intervensi_hingga = '5';
        $nsRujukanSkor->keterangan_umum = 'Terpuji';
        $nsRujukanSkor->tindakan = 'Nilai sepunya boleh dikekalkan';
        $nsRujukanSkor->created_by = 1;
        $nsRujukanSkor->updated_by = 1;
        $nsRujukanSkor->save();

        $nsRujukanSkor = new NsScoreReference();
        $nsRujukanSkor->ns_id = $ns->id;
        $nsRujukanSkor->skor_penilaian_intervensi_dari = '4';
        $nsRujukanSkor->skor_penilaian_intervensi_hingga = '4.99';
        $nsRujukanSkor->keterangan_umum = 'Cemerlang';
        $nsRujukanSkor->tindakan = 'Nilai profesionalisme boleh ditambahbaik';
        $nsRujukanSkor->created_by = 1;
        $nsRujukanSkor->updated_by = 1;
        $nsRujukanSkor->save();

        $nsRujukanSkor = new NsScoreReference();
        $nsRujukanSkor->ns_id = $ns->id;
        $nsRujukanSkor->skor_penilaian_intervensi_dari = '3';
        $nsRujukanSkor->skor_penilaian_intervensi_hingga = '3.99';
        $nsRujukanSkor->keterangan_umum = 'Sederhana';
        $nsRujukanSkor->tindakan = 'Nilai profesionalisme perlu ditambahbaik. Intervensi';
        $nsRujukanSkor->created_by = 1;
        $nsRujukanSkor->updated_by = 1;
        $nsRujukanSkor->save();

        $nsRujukanSkor = new NsScoreReference();
        $nsRujukanSkor->ns_id = $ns->id;
        $nsRujukanSkor->skor_penilaian_intervensi_dari = '2';
        $nsRujukanSkor->skor_penilaian_intervensi_hingga = '2.99';
        $nsRujukanSkor->keterangan_umum = 'Memuaskan';
        $nsRujukanSkor->tindakan = 'Memerlukan intervensi';
        $nsRujukanSkor->created_by = 1;
        $nsRujukanSkor->updated_by = 1;
        $nsRujukanSkor->save();

        $nsRujukanSkor = new NsScoreReference();
        $nsRujukanSkor->ns_id = $ns->id;
        $nsRujukanSkor->skor_penilaian_intervensi_dari = '1';
        $nsRujukanSkor->skor_penilaian_intervensi_hingga = '1.99';
        $nsRujukanSkor->keterangan_umum = 'Tidam Memuaskan';
        $nsRujukanSkor->tindakan = 'Memerlukan intervensi secara intensif';
        $nsRujukanSkor->created_by = 1;
        $nsRujukanSkor->updated_by = 1;
        $nsRujukanSkor->save();
    }
}
