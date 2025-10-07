<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ministries = DB::connection('eriasm2')->table('dbo.ViewDepartment')->select('DepartmentCode', 'DepartmentDesc', 'MinistryCode', 'HODTitle')->get();
        $department_types = DB::table('department_types')->get();
        $arrayInsert = [];
        foreach ($ministries as $ministry) {
            if (trim($ministry->MinistryCode) === null) {
                $department_type = null;
            } else {
                $getCode = $department_types->where('code', trim($ministry->MinistryCode))->first();
                if ($getCode === null) {
                    $department_type = null;
                } else {
                    $department_type = $getCode->id;
                }
            }
            // $arrayInsert[] = [
            //     'department_type_id' => $department_type,
            //     'code' => trim($ministry->DepartmentCode),
            //     'name' => trim($ministry->DepartmentDesc),
            //     'hod_title' => trim($ministry->HODTitle),
            //     'created_at' => now(),
            //     'updated_at' => now()
            // ];
            $newDepartment = new Department();
            $newDepartment->department_type_id = $department_type;
            $newDepartment->code = trim($ministry->DepartmentCode);
            $newDepartment->name = trim($ministry->DepartmentDesc);
            $newDepartment->hod_title = trim($ministry->HODTitle);
            $newDepartment->save();
        }
    }
}
