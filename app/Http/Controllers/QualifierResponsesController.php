<?php

namespace App\Http\Controllers;

use App\Models\QualifierResponse;
use Illuminate\Http\Request;

class QualifierResponsesController extends Controller
{

    public function index(Request $request)
    {
        $qualifications = QualifierResponse::join('victims', 'victims.id', '=','qualifier_responses.victim')->join('users', 'users.email', '=','qualifier_responses.interviewing_officer')->where('qualifier_responses.case_reference','=',$request->case_reference)->get(['victims.id AS victim_id','qualifier_responses.id','users.firstname AS officer_fname','users.lastname AS officer_lname', 'victims.name AS victim', 'qualifier_responses.created_at AS timestamp']);

        return array(
            'status'=>'success',
            'message'=>count($qualifications)." results found!",
            'data'=>$qualifications
        );

    }

    public function store(Request $request)
    {
        try{
            $response = new QualifierResponse();
            $response->case_reference = $request->case_reference;
            $response->interviewing_officer = $request->officer;
            $response->victim = $request->client;
            $response->responses = serialize($request->response);

            $response->save();

            return array(
                'status'=>'success',
                'message'=>"Your interview was saved successfully!"
            );
        }catch(Exception $err){
            return response(array(
                'status'=>'error',
                'message'=>$err
            ));
        }
    }

    public function show(QualifierResponse $qualifierResponse)
    {
        //
    }

    public function edit(QualifierResponse $qualifierResponse)
    {
        //
    }

    public function update(Request $request, QualifierResponse $qualifierResponse)
    {
        //
    }

    public function destroy(QualifierResponse $qualifierResponse)
    {
        //
    }
}
