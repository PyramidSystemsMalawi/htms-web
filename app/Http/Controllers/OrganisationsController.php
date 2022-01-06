<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use Illuminate\Http\Request;

class OrganisationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organisations = Organisation::all();
        $userdata = array(
            'firstname' => "Clifford",
            'lastname' => "Mwale"
        );
        //var_dump($organisations);
        return view('pages.organisations.list')->with(array(
            'title'=>'Organisations',
            'userdata'=>$userdata,
            'organisations'=> $organisations
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{
            $organisation =  new Organisation();
            $organisation->organisation_name = $request->organisation_name;
            $organisation->physical_address = $request->physical_address;
            $organisation->description = $request->description;
            $organisation->email = $request->email;
            $organisation->phone = $request->phone;

            $organisation->save();
        }catch(Exception $err){

        }finally{
            return redirect()->route('organisations-list');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Create Organisation
        try{
            $organisation =  Organisation::create($request->all());
            return array(
                'status'=>'success',
                'message'=>'New organisation registered successfully!',
                'data'=>$organisation
            );
        }catch(Exception $err){
            return response(array(
                'status'=>'error',
                'message'=>'Failed to create save data!',
                'error'=>$err
            ),500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

       try{
            $organisation = Organisation::findOrFail($id);
            return array(
                'status'=>"success",
                'message'=>'Organisation record found!',
                'data'=>$organisation
            );
        }catch(Exception $err){
            return response(array(
                'status'=>'error',
                'massage'=>'The provided organisation_id does not exist!'
            ),400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function edit(Organisation $organisation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organisation $organisation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisation $organisation)
    {
        //
    }
}
