<?php

namespace Database\Seeders;

use App\Models\AppointStatus;
use App\Models\DepartmentType;
use App\Models\District;
use App\Models\Zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DepartmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departmentType = new DepartmentType();
        $departmentType->code = 'M';
        $departmentType->name = 'Kementerian';
        $departmentType->save();

        $departmentType = new DepartmentType();
        $departmentType->code = 'J';
        $departmentType->name = 'Jabatan';
        $departmentType->save();

        $departmentType = new DepartmentType();
        $departmentType->code = 'MD';
        $departmentType->name = 'Majlis Daerah';
        $departmentType->save();

        $departmentType = new DepartmentType();
        $departmentType->code = 'PD';
        $departmentType->name = 'Pejabat Daearah';
        $departmentType->save();

        $departmentType = new DepartmentType();
        $departmentType->code = 'B';
        $departmentType->name = 'Badan Berkanun';
        $departmentType->save();
    }
}
