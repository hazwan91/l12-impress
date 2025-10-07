<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->role = Role::SUPER_ADMIN;
        $user->appoint_status_id = 1;
        $user->type = UserType::SM2;
        $user->ic = '911025125537';
        $user->name = 'WAN AHMAD HAZWAN BIN AHMAD SUHAINI';
        $user->email = 'hazwan.ahmadsuhaini@sabah.gov.my';
        $user->password = Hash::make('123');
        $user->active = 1;
        $user->save();
    }
}
