<?php

namespace App\Http\Controllers;

use App\Models\Victim;
use App\Models\Cases;
use App\Models\QualifierResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Auth;

class VictimsController extends Controller
{

    public function index(Request $request)
    {
        //Get victims
        try{
            $victims;
            if(isset($request->case_reference) && !empty($request->case_reference)){
                $victims = Victim::where('case_reference','=',$request->case_reference)->get();
            }else{
                $victims = Victim::all();
            }
            return array('status'=>'success','message'=>count($victims)." results found!",'data'=>$victims);
        }catch(Exception $err){
            return response(array('message'=>'Internal Server Error!', 'error'=>$err),500);
        }
    }

   public function list(Request $request){
       $victims = Victim::all();
        $userdata = Auth::user();
        return view('pages.victims.list')->with(array(
            'title'=>'Victims',
            'victims'=>$victims,
            'userdata'=>$userdata
        ));
   }

   public function getInterviewResponses(Request $request){
        try{
            $interview = QualifierResponse::where('victim','=',$request->victim_id)->get();
            $interview = unserialize($interview[0]->responses);

            return response()->json([
                'status'=>'success',
                'message'=>'TIP Screening Interview retrieved!',
                'data'=>$interview
            ]);
        }catch(Exception $err){
            return response()->json([
                'status'=>'error',
                'message'=>$err->getMessage()
            ]);
        }
   }

    public function view(Request $request)
    {
        $victims = Victim::where('id','=',$request->victim_id)->get();
        $interview = QualifierResponse::where('victim','=',$request->victim_id)->get();
        $interview = unserialize($interview[0]->responses);
        $case = Cases::where('reference','=',$victims[0]->case_reference)->get();
        // var_dump($interview);
        // return;
        // $interview = json_decode($interview);
        $userdata = Auth::user();
        return view('pages.victims.view')->with(array(
            'title' => 'Victims',
            'victimdetails' => $victims[0],
            'userdata' => $userdata,
            'interviews'=> $interview,
            'case'=>$case[0]
        ));
    }

    public function store(Request $request)
    {
        //Add victim to case
        try{
            $victim = new Victim();

            $victim->case_reference = $request->case_reference;
            $victim->name = $request->name;
            $victim->gender = $request->gender;
            $victim->dob = $request->dob;
            $victim->age = $request->age;
            $victim->marital_status = $request->marital_status;
            $victim->phone_number = $request->phone_number;
            $victim->residency_address = $request->residency_address;
            $victim->home_address = $request->home_address;
            $victim->health_status = $request->health_status;

            if(isset($request->image) && !empty($request->image)){
                $upload = FilesController::saveFile($request->image, 'victims');
                if($upload != 'error'){
                    $victim->image_url = $upload;
                }
            }

            $victim->save();

            return array('status'=>'success','message'=>'New victim registered to case!');

        }catch(Exception $err){
            return response(array('message'=>'Internal Server Error!', 'error'=>$err),500);
        }
    }


    public function show(Victim $victim)
    {
        //
    }


    public function edit(Victim $victim)
    {
        //
    }


    public function update(Request $request, Victim $victim)
    {
        //
    }


    public function destroy($id)
    {
        //Permanently delete victim's profile
        try{
            $victim  = Victim::find($id);
            $victim->delete();
            return array('status'=>'success', 'message'=>'Victim\'s profile destroyed permanently!' );
        }catch(Exception $err){
            return response(array('message'=>'Internal server error!','error'=>$err),500);
        }
    }
}
