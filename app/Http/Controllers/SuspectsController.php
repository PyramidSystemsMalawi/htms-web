<?php

namespace App\Http\Controllers;

use App\Models\Suspect;
use Illuminate\Http\Request;
use App\Http\Controllers\FileController;


class SuspectsController extends Controller
{
  
    public function index()
    {
         try{
            $suspects;
            if(isset($request->case_reference) && !empty($request->case_reference)){
                $suspects = Suspect::where('case_reference','=',$request->case_reference)->get();
            }else{
                $suspects = Suspect::all();
            }
            return array('status'=>'success','message'=>count($suspects)." results found!",'data'=>$suspects);
        }catch(Exception $err){
            return response(array('message'=>'Internal Server Error!', 'error'=>$err),500);
        }
    }

    public function create()
    {
    
    }

   
    public function store(Request $request)
    {
        //Add Suspect To Case
        try{
            $suspect = new Suspect();

            $suspect->case_reference = $request->case_reference;
            $suspect->name = $request->name;
            $suspect->gender = $request->gender;
            $suspect->nationality = $request->nationality;
            $suspect->last_known_address = $request->last_known_address;
            $suspect->current_status = $request->current_status;
            $suspect->age = $request->age;

             if(isset($request->image) && !empty($request->image)){
                $upload = FilesController::saveFile($request->image, 'suspects');
                if($upload != 'error'){
                    $suspect->image_url = $upload;
                }
            }

            $suspect->save();

            return array(
                'status'=>'success', 
                'message'=>'Suspect file successfully added to Case!'
            );

        }catch(Exception $err){
            return response(array(
                'message'=>'Internal Server Error!',
                'error'=>$err
            ),500);
        }
    }

    public function show(Suspect $suspect)
    {
        //
    }

    public function edit(Suspect $suspect)
    {
        //
    }

    public function update(Request $request, Suspect $suspect)
    {
        //
    }

    public function destroy(Suspect $suspect)
    {
        //
    }
}
