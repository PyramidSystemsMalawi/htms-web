<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class OrganizationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organisations')->insert([
            'organisation_name'=>'Pyramid Systems',
            'physical_address'=>'Area 47, LL',
            'email'=>'info@pyramidsystemsmw.com',
            'phone'=>'265994791131',
            'contact_person'=>'Clifford Mwale'
        ]);
    }
}
