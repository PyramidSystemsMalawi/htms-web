<?php

namespace App\Http\Controllers;

use App\Models\DeletionRequest;
use Illuminate\Http\Request;

class DeletionRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $delReq = new DeletionRequest();
        $delReq->case_reference = $request->case_reference;
        $delReq->officer = $request->officer;
        $delReq->status = 'pending';
        $delReq->reason = $request->reason;

        $delReq->save();

        return(array(
            'status'=>'success',
            'message' => 'Deletion request created successfully'
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeletionRequest  $deletionRequest
     * @return \Illuminate\Http\Response
     */
    public function show(DeletionRequest $deletionRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeletionRequest  $deletionRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(DeletionRequest $deletionRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeletionRequest  $deletionRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $deletionAction = DeletionRequest::find($request->delReqID);
        if($request->action = 'approved'){
            //Update record and set status to approved
            $deletionAction->status = 'approved';
            $deletionAction->comment = $request->comment;
        }else{
            //Update record and set status to rejected
            $deletionAction->status = 'rejected';
            $deletionAction->comment = $request->comment;
        }
        $deletionAction->save();
        redirect::to('/deletion-requests');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeletionRequest  $deletionRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeletionRequest $deletionRequest)
    {
        //
    }
}
