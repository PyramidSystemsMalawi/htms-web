<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cases;
use App\Models\Victim;
use App\Models\Suspect;
use App\Models\Organisation;
use Illuminate\Support\Facades\Auth;



class ReportsController extends Controller
{
    public function index(){
        $userdata = Auth::user();
        return view('pages.reports.list')->with(array(
            'title'=>'Reports',
            'userdata'=>$userdata,
            'report_group'=>'All'
        ));
    }

    public function show(Request $request){
        try{
            $userdata = Auth::user();

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
            if ($type == 'Organisations') {
                $report = Organisation::all();
                $view_name = 'pages.reports.organisation';
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

    public function getOrgReports(){
        $report = Organisation::all();
        foreach ($report as $key => $value) {
            $report[$key]->users = count(User::where('organisation', '=', $value->id)->get());
            $report[$key]->cases = count(Cases::join('case_officers','cases.reference','=','case_officers.case')
            ->join('users','users.email','=','case_officers.officer')->where('users.organisation', '=', $value->id)->get());
        }
        return $report;
    }


}
