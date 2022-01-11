<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CaseOfficerController;
use App\Models\User;
use App\Models\Cases;
use App\Models\Victim;
use App\Models\Suspect;
use App\Models\Organisation;
use App\Models\CaseOfficer;
use Illuminate\Http\Request;
use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Auth;



class CasesController extends Controller
{
    public function index(Request $request)
    {
        //Filter Cases
        try{
            $case_list;
            if(isset($request->officer) && !empty($request->officer)){
                $case_list = Cases::join('case_officers', 'case_officers.case', '=', 'cases.reference')
                ->join('users', 'users.email', '=','case_officers.officer')
                ->where('case_officers.officer','=',$request->officer)
                ->get(['cases.*', 'case_officers.officer','users.firstname','users.lastname']);

                for ($i = 0; $i < count($case_list); $i++) {
                    $case_list[$i]['victims'] = count(Victim::where('case_reference', '=', $case_list[$i]->reference)->get());
                    $case_list[$i]['suspects'] = count(Suspect::where('case_reference', '=', $case_list[$i]->reference)->get());

                    $case_list[$i]['case_officer'] = $case_list[$i] -> firstname . ' ' . $case_list[$i] -> lastname;
                    //Unset firstname and lastname fields from case_list array for
                    //the case officer name
                    unset($case_list[$i]->firstname);
                    unset($case_list[$i]->lastname);
                }
            }else{
                $case_list = Cases::join('case_officers', 'case_officers.case', '=', 'cases.reference')->join('users', 'users.email', '=','case_officers.officer')->get(['cases.*', 'case_officers.officer','users.firstname','users.lastname']);


                for ($i = 0; $i < count($case_list); $i++) {
                    $case_list[$i]['victims'] = count(Victim::where('case_reference', '=', $case_list[$i]->reference)->get());
                    $case_list[$i]['suspects'] = count(Suspect::where('case_reference', '=', $case_list[$i]->reference)->get());

                    $case_list[$i]['case_officer'] = $case_list[$i] -> firstname . ' ' . $case_list[$i] -> lastname;
                    //Unset firstname and lastname fields from case_list array for
                    //the case officer name
                    unset($case_list[$i]->firstname);
                    unset($case_list[$i]->lastname);
                }
            }

            return array(
                'status'=>'success',
                'message'=>count($case_list)." results found!",
                'data'=>$case_list
            );
        }catch(Exception $err){
            return response(array('message'=>'Internal Server Error', 'error'=>$err),500);
        }
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //Create case
        try {
            $case = new Cases();
            $case->case_name = $request->case_title;
            $case->district = $request->district;
            $case->traditional_authority = $request->trad_auth;
            $case->village = $request->village;
            $case->brief = $request->brief;

            $case->save();



           $multiPurposeObject = array(
                'officer'=>$request->officer,
                'reference'=>$case->reference
           );
            CaseOfficerController::store($multiPurposeObject);
            NotesController::create($multiPurposeObject);

            return array(
                'status'=>'success',
                "message"=>"New case created successfully!",
                'data'=>array('reference'=>$case->reference)
            );
        } catch (Exception $err) {
            return response(array(
                "message"=>"Internal Server Error!",
                "error"=>$err
            ),500);
        }
    }

    public function list(Request $request){
        try{
            $userdata = Auth::user();
            $case_list = Cases::join('case_officers', 'case_officers.case', '=', 'cases.reference')->join('users', 'users.email', '=', 'case_officers.officer')->get(['cases.*', 'case_officers.officer', 'users.firstname', 'users.lastname']);

            for ($i = 0; $i < count($case_list); $i++) {
                $case_list[$i]['victims'] = count(Victim::where('case_reference', '=', $case_list[$i]->reference)->get());
                $case_list[$i]['suspects'] = count(Suspect::where('case_reference', '=', $case_list[$i]->reference)->get());
            }

            return view('pages.cases.list')->with(array(
                'title'=>'Cases',
                'userdata'=>$userdata,
                'cases'=>$case_list
            ));
        }catch(Exception $err){

        }
    }
    public function view(Request $request){
        $userdata = Auth::user();
        $casedetails = Cases::join('case_officers', 'case_officers.case', '=', 'cases.reference')
        ->join('users', 'users.email', '=', 'case_officers.officer')
        ->where('cases.reference', '=', $request->case_reference)
            ->get(['cases.*', 'case_officers.officer', 'users.firstname', 'users.lastname','users.organisation']);

        $casedetails[0]['victims'] = count(Victim::where('case_reference', '=', $request->case_reference)->get());
        $casedetails[0]['suspects'] = count(Suspect::where('case_reference', '=', $request->case_reference)->get());
        $casedetails[0]['officers'] = count(CaseOfficer::where('case', '=', $request->case_reference)->get());


        $organisations = Organisation::where('id' , '!=', $casedetails[0]->organisation)->get();

        $availableOfficers = User::where('organisation', '!=', $request->organisation)->get();

        return view('pages.cases.view')->with(array(
            'title'=>'View Case',
            'userdata'=>$userdata,
            'casedetails'=>$casedetails[0],
            'organisations'=>$organisations,
            'availOfficers'=>$availableOfficers
        ));
    }

    public function show(Cases $cases)
    {
        //
    }

    public function edit(Cases $cases)
    {
        //
    }

    public function update(Request $request, Cases $cases)
    {
        //
    }

    public function destroy(Request $request)
    {
        //Get case by reference
        $case = Cases::where('reference', '=', $request->case_reference)->first();
        $case->update(['status'=>'DELETED']);
        return redirect()->route('case-list');
    }

    public static function makeReport(){
        $caseReports = array(

        );

        return $caseReports;
    }
}
