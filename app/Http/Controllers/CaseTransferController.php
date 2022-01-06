<?php

namespace App\Http\Controllers;

use App\Models\CaseTransfer;
use App\Models\CaseOfficer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CaseTransferController extends Controller
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
        $case_officer =  CaseOfficer::where('case', '=', $request->case_reference)->get();
        CaseOfficer::find($case_officer[0]->id)->update(['officer'=>$request->recepient_officer]);


        $transfer = new CaseTransfer();
        $transfer->case_reference = $request->case_reference;
        $transfer->transfer_to = $request->transfer_to;
        $transfer->transfer_from = $request->transfer_from;
        $transfer->transfer_reason = $request->transfer_reason;

        $transfer->save();

        Session::flash('message', 'Case successfully transfered to another Organisation!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('case-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CaseTransfer  $caseTransfer
     * @return \Illuminate\Http\Response
     */
    public function show(CaseTransfer $caseTransfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CaseTransfer  $caseTransfer
     * @return \Illuminate\Http\Response
     */
    public function edit(CaseTransfer $caseTransfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CaseTransfer  $caseTransfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CaseTransfer $caseTransfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CaseTransfer  $caseTransfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(CaseTransfer $caseTransfer)
    {
        //
    }
}
