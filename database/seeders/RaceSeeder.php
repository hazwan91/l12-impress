<?php

namespace Database\Seeders;

use App\Models\Race;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $races = DB::connection('sm2viewlogin')->table('dbo.Race')->select('RaceDesc')->get();
        $arrayInsert = [];
        foreach ($races as $race) {
            $dbRace = Race::query()->where('name', trim($race->RaceDesc))->count();
            if ($dbRace === 0) {
                $newrace = new Race();
                $newrace->name = trim($race->RaceDesc);
                $newrace->save();
            }
        }
    }
}
