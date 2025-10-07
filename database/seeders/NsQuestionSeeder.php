<?php

namespace Database\Seeders;

use App\Models\NilaiSepunya;
use App\Models\NsBankQuestion;
use App\Models\NsQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NsQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nsBankQuestions = NsBankQuestion::query()->get();
        $ns = NilaiSepunya::query()->where('year', '=', '2025')->firstOrFail();
        $array = [];
        foreach ($nsBankQuestions as $nsBankQuestion) {
            $array[] = [
                'nilai_sepunya_id' => $ns->id,
                'ns_bank_question_id' => $nsBankQuestion->id,
                'active' => true,
                'created_by' => 1,
                'updated_by' => 1,
            ];
        }

        NsQuestion::insert($array);
    }
}
