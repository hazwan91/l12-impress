<?php

namespace Database\Seeders;

use App\Models\NilaiSepunya;
use App\Models\NsBankQuestion;
use App\Models\NsQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NsBankQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ns = NilaiSepunya::query()->where('year', '=', '2025')->firstOrFail();

        $nsPrefix = 'NS-';
        $nsIncNo = 0;

        $nsBankSoalan = new NsBankQuestion();
        $nsBankSoalan->no_siri = $nsPrefix . $nsIncNo++;
        $nsBankSoalan->perkara = 'Memberi layanan yang sama rata kepada semua pihak';
        $nsBankSoalan->reverse = false;
        $nsBankSoalan->created_by = 1;
        $nsBankSoalan->updated_by = 1;
        $nsBankSoalan->save();

        $nsSoalan = new NsQuestion();
        $nsSoalan->ns_id = $ns->id;
        $nsSoalan->ns_bank_soalan_id = $nsBankSoalan->id;
        $nsSoalan->active = true;
        $nsSoalan->created_by = 1;
        $nsSoalan->updated_by = 1;
        $nsSoalan->save();

        $nsBankSoalan = new NsBankQuestion();
        $nsBankSoalan->no_siri = $nsPrefix . $nsIncNo++;
        $nsBankSoalan->perkara = 'Bersedia mengakui kesilapan dan kesalahan diri sendiri';
        $nsBankSoalan->reverse = false;
        $nsBankSoalan->created_by = 1;
        $nsBankSoalan->updated_by = 1;
        $nsBankSoalan->save();

        $nsSoalan = new NsQuestion();
        $nsSoalan->ns_id = $ns->id;
        $nsSoalan->ns_bank_soalan_id = $nsBankSoalan->id;
        $nsSoalan->active = true;
        $nsSoalan->created_by = 1;
        $nsSoalan->updated_by = 1;
        $nsSoalan->save();

        $nsBankSoalan = new NsBankQuestion();
        $nsBankSoalan->no_siri = $nsPrefix . $nsIncNo++;
        $nsBankSoalan->perkara = 'Berupaya untuk bekerjsama dengan individu lain demi mencapai matlamat tugasan / organisasi';
        $nsBankSoalan->reverse = false;
        $nsBankSoalan->created_by = 1;
        $nsBankSoalan->updated_by = 1;
        $nsBankSoalan->save();

        $nsSoalan = new NsQuestion();
        $nsSoalan->ns_id = $ns->id;
        $nsSoalan->ns_bank_soalan_id = $nsBankSoalan->id;
        $nsSoalan->active = true;
        $nsSoalan->created_by = 1;
        $nsSoalan->updated_by = 1;
        $nsSoalan->save();

        $nsBankSoalan = new NsBankQuestion();
        $nsBankSoalan->no_siri = $nsPrefix . $nsIncNo++;
        $nsBankSoalan->perkara = 'Berkongsi maklumat berkaitan tugasan yang terkini dalam pasukan / organisasi';
        $nsBankSoalan->reverse = false;
        $nsBankSoalan->created_by = 1;
        $nsBankSoalan->updated_by = 1;
        $nsBankSoalan->save();

        $nsSoalan = new NsQuestion();
        $nsSoalan->ns_id = $ns->id;
        $nsSoalan->ns_bank_soalan_id = $nsBankSoalan->id;
        $nsSoalan->active = true;
        $nsSoalan->created_by = 1;
        $nsSoalan->updated_by = 1;
        $nsSoalan->save();

        $nsBankSoalan = new NsBankQuestion();
        $nsBankSoalan->no_siri = $nsPrefix . $nsIncNo++;
        $nsBankSoalan->perkara = 'Bersedia menerima nasihat, pandangan dan cadangan';
        $nsBankSoalan->reverse = false;
        $nsBankSoalan->created_by = 1;
        $nsBankSoalan->updated_by = 1;
        $nsBankSoalan->save();

        $nsSoalan = new NsQuestion();
        $nsSoalan->ns_id = $ns->id;
        $nsSoalan->ns_bank_soalan_id = $nsBankSoalan->id;
        $nsSoalan->active = true;
        $nsSoalan->created_by = 1;
        $nsSoalan->updated_by = 1;
        $nsSoalan->save();

        $nsBankSoalan = new NsBankQuestion();
        $nsBankSoalan->no_siri = $nsPrefix . $nsIncNo++;
        $nsBankSoalan->perkara = 'Menghormati orang lain tanpa mengira latar belakang';
        $nsBankSoalan->reverse = false;
        $nsBankSoalan->created_by = 1;
        $nsBankSoalan->updated_by = 1;
        $nsBankSoalan->save();

        $nsSoalan = new NsQuestion();
        $nsSoalan->ns_id = $ns->id;
        $nsSoalan->ns_bank_soalan_id = $nsBankSoalan->id;
        $nsSoalan->active = true;
        $nsSoalan->created_by = 1;
        $nsSoalan->updated_by = 1;
        $nsSoalan->save();

        $nsBankSoalan = new NsBankQuestion();
        $nsBankSoalan->no_siri = $nsPrefix . $nsIncNo++;
        $nsBankSoalan->perkara = 'Memahami keadaan, perasaan dan keperluan orang lain (empati)';
        $nsBankSoalan->reverse = false;
        $nsBankSoalan->created_by = 1;
        $nsBankSoalan->updated_by = 1;
        $nsBankSoalan->save();

        $nsSoalan = new NsQuestion();
        $nsSoalan->ns_id = $ns->id;
        $nsSoalan->ns_bank_soalan_id = $nsBankSoalan->id;
        $nsSoalan->active = true;
        $nsSoalan->created_by = 1;
        $nsSoalan->updated_by = 1;
        $nsSoalan->save();

        $nsBankSoalan = new NsBankQuestion();
        $nsBankSoalan->no_siri = $nsPrefix . $nsIncNo++;
        $nsBankSoalan->perkara = 'Mengguna waktu bekerja dengan sebaiknya untuk menyelesaikan tugas';
        $nsBankSoalan->reverse = false;
        $nsBankSoalan->created_by = 1;
        $nsBankSoalan->updated_by = 1;
        $nsBankSoalan->save();

        $nsSoalan = new NsQuestion();
        $nsSoalan->ns_id = $ns->id;
        $nsSoalan->ns_bank_soalan_id = $nsBankSoalan->id;
        $nsSoalan->active = true;
        $nsSoalan->created_by = 1;
        $nsSoalan->updated_by = 1;
        $nsSoalan->save();

        $nsBankSoalan = new NsBankQuestion();
        $nsBankSoalan->no_siri = $nsPrefix . $nsIncNo++;
        $nsBankSoalan->perkara = 'Tidak memilih kerja dan berupaya melaksanakan semua tugasan yang diberikan';
        $nsBankSoalan->reverse = false;
        $nsBankSoalan->created_by = 1;
        $nsBankSoalan->updated_by = 1;
        $nsBankSoalan->save();

        $nsSoalan = new NsQuestion();
        $nsSoalan->ns_id = $ns->id;
        $nsSoalan->ns_bank_soalan_id = $nsBankSoalan->id;
        $nsSoalan->active = true;
        $nsSoalan->created_by = 1;
        $nsSoalan->updated_by = 1;
        $nsSoalan->save();

        $nsBankSoalan = new NsBankQuestion();
        $nsBankSoalan->no_siri = $nsPrefix . $nsIncNo++;
        $nsBankSoalan->perkara = 'Mampu mengawal emosi terutama apabila berhadapan keadaan sukar, mendesak atau di luar kawalan';
        $nsBankSoalan->reverse = false;
        $nsBankSoalan->created_by = 1;
        $nsBankSoalan->updated_by = 1;
        $nsBankSoalan->save();

        $nsSoalan = new NsQuestion();
        $nsSoalan->ns_id = $ns->id;
        $nsSoalan->ns_bank_soalan_id = $nsBankSoalan->id;
        $nsSoalan->active = true;
        $nsSoalan->created_by = 1;
        $nsSoalan->updated_by = 1;
        $nsSoalan->save();

        $nsBankSoalan = new NsBankQuestion();
        $nsBankSoalan->no_siri = $nsPrefix . $nsIncNo++;
        $nsBankSoalan->perkara = 'Mengamalkan kot etika kerja yang ditetapkan oleh jabatan';
        $nsBankSoalan->reverse = false;
        $nsBankSoalan->created_by = 1;
        $nsBankSoalan->updated_by = 1;
        $nsBankSoalan->save();

        $nsSoalan = new NsQuestion();
        $nsSoalan->ns_id = $ns->id;
        $nsSoalan->ns_bank_soalan_id = $nsBankSoalan->id;
        $nsSoalan->active = true;
        $nsSoalan->created_by = 1;
        $nsSoalan->updated_by = 1;
        $nsSoalan->save();

        $nsBankSoalan = new NsBankQuestion();
        $nsBankSoalan->no_siri = $nsPrefix . $nsIncNo++;
        $nsBankSoalan->perkara = 'Tidak berada di tempat kerja tanpa kebenaran';
        $nsBankSoalan->reverse = true;
        $nsBankSoalan->created_by = 1;
        $nsBankSoalan->updated_by = 1;
        $nsBankSoalan->save();

        $nsSoalan = new NsQuestion();
        $nsSoalan->ns_id = $ns->id;
        $nsSoalan->ns_bank_soalan_id = $nsBankSoalan->id;
        $nsSoalan->active = true;
        $nsSoalan->created_by = 1;
        $nsSoalan->updated_by = 1;
        $nsSoalan->save();

        $nsBankSoalan = new NsBankQuestion();
        $nsBankSoalan->no_siri = $nsPrefix . $nsIncNo++;
        $nsBankSoalan->perkara = 'Menyalahguna kedudukan sebagai penjawat awam';
        $nsBankSoalan->reverse = true;
        $nsBankSoalan->created_by = 1;
        $nsBankSoalan->updated_by = 1;
        $nsBankSoalan->save();

        $nsSoalan = new NsQuestion();
        $nsSoalan->ns_id = $ns->id;
        $nsSoalan->ns_bank_soalan_id = $nsBankSoalan->id;
        $nsSoalan->active = true;
        $nsSoalan->created_by = 1;
        $nsSoalan->updated_by = 1;
        $nsSoalan->save();

        $nsBankSoalan = new NsBankQuestion();
        $nsBankSoalan->no_siri = $nsPrefix . $nsIncNo++;
        $nsBankSoalan->perkara = 'Perilaku yang boleh menjatuhkan imej perkhidmatan awam';
        $nsBankSoalan->reverse = true;
        $nsBankSoalan->created_by = 1;
        $nsBankSoalan->updated_by = 1;
        $nsBankSoalan->save();

        $nsSoalan = new NsQuestion();
        $nsSoalan->ns_id = $ns->id;
        $nsSoalan->ns_bank_soalan_id = $nsBankSoalan->id;
        $nsSoalan->active = true;
        $nsSoalan->created_by = 1;
        $nsSoalan->updated_by = 1;
        $nsSoalan->save();

        $nsBankSoalan = new NsBankQuestion();
        $nsBankSoalan->no_siri = $nsPrefix . $nsIncNo++;
        $nsBankSoalan->perkara = 'Membuat gangguan berunsur seksual di tempat kerja';
        $nsBankSoalan->reverse = true;
        $nsBankSoalan->created_by = 1;
        $nsBankSoalan->updated_by = 1;
        $nsBankSoalan->save();

        $nsSoalan = new NsQuestion();
        $nsSoalan->ns_id = $ns->id;
        $nsSoalan->ns_bank_soalan_id = $nsBankSoalan->id;
        $nsSoalan->active = true;
        $nsSoalan->created_by = 1;
        $nsSoalan->updated_by = 1;
        $nsSoalan->save();
    }
}
