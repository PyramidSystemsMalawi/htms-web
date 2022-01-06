<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cases;
use App\Models\Victim;
use App\Models\Suspect;
use App\Models\Organisation;


class ReportsController extends Controller
{
    public function index(){
        $userdata = array(
            'firstname' => "Clifford",
            'lastname' => "Mwale"
        );
        return view('pages.reports.list')->with(array(
            'title'=>'Reports',
            'userdata'=>$userdata,
            'report_group'=>'All'
        ));
    }

    public function show(Request $request){
        try{
            $userdata = array(
                'firstname' => "Clifford",
                'lastname' => "Mwale"
            );

            $type = $request->report_type;
            $view_name = "";
            if($type == 'Cases'){
                $report = Cases::all();
                $view_name = 'pages.reports.case';
            }
            if ($type == 'Victims') {
                $report = Victim::all();
                $view_name = 'pages.reports.victim';
            }
            if ($type == 'Suspects') {
                $report = Suspect::all();
                $view_name = 'pages.reports.suspect';
            }
            return view($view_name)->with(array(
                'title' => 'Reports',
                'userdata' => $userdata,
                'report' => json_encode($report),
                'report_group'=>$request->report_type
            ));
        }catch(Exception $err){

        }
    }


}
