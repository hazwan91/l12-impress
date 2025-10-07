<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stations = DB::connection('eriasm2')->table('dbo.ViewStation')->select('DepartmentCode', 'StationCode', 'StationDesc')->get();
        $departments = DB::table('departments')->get();
        $arrayInsert = [];
        foreach ($stations as $station) {
            $department = $departments->where('code', trim($station->DepartmentCode))->first();
            $newStation = new Station();
            $newStation->department_id = $department === null ? null : $department->id;
            $newStation->code = trim($station->StationCode);
            $newStation->name = trim($station->StationDesc);
            $newStation->save();
        }
    }
}
