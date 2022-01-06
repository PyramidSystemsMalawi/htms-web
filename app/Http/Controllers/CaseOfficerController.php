<?php

namespace App\Http\Controllers;

use App\Models\CaseOfficer;

class CaseOfficerController extends Controller
{

    public static function store($data)
    {
        //Assign case to an officer
        try{
            $case_officer = new CaseOfficer();
            $case_officer->officer = $data['officer'];
            $case_officer->case = $data['reference'];

            $case_officer->save();

            return true;
        }catch(Exception $err){
            return false;
        }
    }

}
