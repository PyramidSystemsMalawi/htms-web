<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'firstname' => 'Jon',
                'lastname' => 'Doe',
                'email' => 'admin@homesecurity.gov.mw',
                'organisation' => 1,
                'role' => 1,
                'password' => Hash::make('D3v@Space')
            ],
            [
                'firstname' => 'Innocent',
                'lastname' => 'Misheck',
                'email' => 'innocentmisheck03@timis.gov.mw',
                'organisation' => 1,
                'role' => 1,
                'password' => Hash::make('D3v@Space')
            ]
        ]);
    }
}
