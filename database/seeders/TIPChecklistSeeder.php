<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TIPChecklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Read all tip questions from json file in public folder
        $json = json_decode(file_get_contents(public_path('qualifiers.json')));

        foreach($json AS $q){
            DB::table('qualifiers')->insert([
                'question' => $q->question,
                'responseType'=>$q->responseType,
                'nullable'=>$q->nullable,
                'possible_answers'=>$q->possible_answers,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

    }
}
