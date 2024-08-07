<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictsTableSeeder extends Seeder
{
    public function run()
    {
        $districts = [
            ['district_name' => 'Blantyre', 'district_code' => 'BT'],
            ['district_name' => 'Balaka', 'district_code' => 'BA'],
            ['district_name' => 'Chikwawa', 'district_code' => 'CK'],
            ['district_name' => 'Chiradzulu', 'district_code' => 'CR'],
            ['district_name' => 'Dedza', 'district_code' => 'DE'],
            ['district_name' => 'Dowa', 'district_code' => 'DO'],
            ['district_name' => 'Karonga', 'district_code' => 'KA'],
            ['district_name' => 'Kasungu', 'district_code' => 'KS'],
            ['district_name' => 'Lilongwe', 'district_code' => 'LL'],
            ['district_name' => 'Machinga', 'district_code' => 'MA'],
            ['district_name' => 'Mangochi', 'district_code' => 'MG'],
            ['district_name' => 'Mchinji', 'district_code' => 'MC'],
            ['district_name' => 'Mzimba', 'district_code' => 'MZI'],
            ['district_name' => 'Mzuzu', 'district_code' => 'MZ'],
            ['district_name' => 'Nkhata Bay', 'district_code' => 'NK'],
            ['district_name' => 'Nkhotakota', 'district_code' => 'NKH'],
            ['district_name' => 'Nsanje', 'district_code' => 'NS'],
            ['district_name' => 'Ntcheu', 'district_code' => 'NC'],
            ['district_name' => 'Ntunthama', 'district_code' => 'NT'],
            ['district_name' => 'Salima', 'district_code' => 'SA'],
            ['district_name' => 'Thyolo', 'district_code' => 'TH'],
            ['district_name' => 'Zomba', 'district_code' => 'ZO'],
        ];

        DB::table('districts')->insert($districts);
    }
}
