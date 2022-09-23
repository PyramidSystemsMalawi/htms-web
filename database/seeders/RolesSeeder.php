<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Developer', 'IT Administartor', 'Case Officer', 'Station Manager', 'Analyst'];
        foreach($roles AS $role){
            DB::table('roles')->insert(['role_name'=>$role]);
        }
    }
}
