<?php

namespace App\Http\Controllers;

use App\Models\VictimAssesment;
use Illuminate\Http\Request;

class VictimsAssesmentController extends Controller
{
   
    public function index(Request $request)
    {
        try{
            $assessment = new VictimAssesment();
            if(isset($request->case_reference) && !empty($request->case_reference)){
                $assessment = $assessment->join('victims', 'victims.id', '=', 'victim_assesments.victim')
                ->where('victim_assesments.case', '=', $request->case_reference)
                ->get(['victim_assesments.*', 'victims.name']);
            }else{
                $assessment = $assessment->join('victims', 'victims.id', '=', 'victim_assesments.victim')->get(['victim_assesments.*', 'victims.name']);
            }

            return array(
                'status'=>'success',
                'message'=>count($assessment)." assessments found!",
                'data'=>$assessment
            );

        }catch(Exception $err){
            return response(array('message'=>'Internal Server Error!'), 500);
        }
    }


    public function create()
    {
        
    }

    public function store(Request $request)
    {
        try{
            $checkAssesment = VictimAssesment::where('case', '=', $request->case)->where('victim', '=',$request->victim)->get();
            if(count($checkAssesment) > 0){
                return response(array(
                    'status'=>'error',
                    'message'=>'Satisfaction Assesment for this Victim was already performed. Please update!'
                ),201);
            }
            $assessment = new VictimAssesment();


            $assessment->case = $request->case;
            $assessment->victim = $request->victim;
            $assessment->FriendlinessOfStaff = $request->FriendlinessOfStaff;
            $assessment->Accessibility = $request->Accessibility;
            $assessment->Distance = $request->Distance;
            $assessment->Interaction = $request->Interaction;
            $assessment->QualityOfService = $request->QualityOfService;
            $assessment->Referals = $request->Referals;
            $assessment->Timeliness = $request->Timeliness;

            $assessment->save();

            return array('status'=>'success', 'message'=>"CM5 Client satisfaction survey saved!");
        }catch(Exception $err){
            return response(array('message'=>"Internal Server Error!", 'error'=>$err),500);
        }
    }


    public function show(VictimAssesment $victimAssesment)
    {
        
    }

    public function edit(VictimAssesment $victimAssesment)
    {
        
    }


    public function update(Request $request, VictimAssesment $victimAssesment)
    {
        
    }

    public function destroy(VictimAssesment $victimAssesment)
    {
        
    }
}
