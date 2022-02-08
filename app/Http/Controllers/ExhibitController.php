<?php

namespace App\Http\Controllers;

use App\Models\Exhibit;
use Illuminate\Http\Request;
use App\Http\Controllers\FileController;


class ExhibitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $exhibits = Exhibit::where('case_reference','=', $request->case_reference)->get();
        return array('status'=>'success','message'=>count($exhibits).' record(s) retrieved!','data'=>$exhibits);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try{
            $exhibit = new Exhibit();

            $exhibit->name = $request->name;
            $exhibit->case_reference = $request->case_reference;

            if(isset($request->file) && !empty($request->file)){
                $upload = FilesController::saveFile($request->file, 'exhibit');
                if($upload != 'error'){
                    $exhibit->url = $upload;
                }
            }

            $exhibit->save();

            return array('status'=>'success','message'=>'Exhibit record created!','data'=>$exhibit);	

        }catch(Exception $err){
            return response()->json(['error' => $err->getMessage()], 500);
        }
    }

    public function show(Exhibit $exhibit)
    {
        //
    }

    public function edit(Exhibit $exhibit)
    {
        //
    }


    public function update(Request $request, Exhibit $exhibit)
    {
        //
    }

    public function destroy(Exhibit $exhibit)
    {
        //
    }
}
