<?php

namespace Database\Seeders;

use App\Models\AppointStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appoint_statuses = DB::connection('jpansrv')->table('dbo.ViewAppointStatus')->select('AppStatusCode', 'AppStatusDesc')->get();

        $array = [];
        foreach ($appoint_statuses as $appoint_status) {
            $array[] = [
                'code' => trim($appoint_status->AppStatusCode),
                'name' => trim($appoint_status->AppStatusDesc),
            ];
        }

        AppointStatus::insert($array);
    }
}
