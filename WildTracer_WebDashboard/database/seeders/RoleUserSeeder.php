<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::all();

        User::all()->each(function ($user) use ($roles){
            $user->roles()->attach(
                $roles->random(1)->pluck('id')
            );
        });
    }
}
