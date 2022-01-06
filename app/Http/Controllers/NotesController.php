<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    
    public function index(Request $request)
    {
       try{
            $note = new Note();
            if(isset($request->case_reference) && !empty($request->case_reference)){
                $note->where('case_reference', '=', $request->case_reference);
            }
            if(isset($request->officer) && !empty($request->officer)){
                $note->where('officer', '=', $request->officer);
            }
            $result = $note->get();
            return array(
                'status'=>'success',
                'message'=>'Query complete!',
                "data"=>$result[0]
            );
       }catch(Exception $err){
            return response(array(
                'message'=>'Internal Server Error!',
                "error"=>$err
            ),500);
       }
    }

    
    public static function create($data)
    {
       try{
            $note = new Note();
            
            $note->case_reference = $data['reference'];
            $note->officer = $data['officer'];
            $note->notes = '';
            $note->save();

            return true;
       }catch(Exception $err){
            return false;
       }
    }

    
    public function store(Request $request)
    {
       try{

            $notes =  Note::where('case_reference', '=', $request->case_reference)->where('officer', '=', $request->officer)->get();

            if(count($notes) > 0){
                $note = Note::find($notes[0]->id)->update(['notes'=>$request->notes]);
            }else{
                $data = array(
                    'reference'=>$request->case_reference,
                    'officer'=>$request->officer,
                    'notes'=>$request->notes
                );

                this::create($data);
            }
            
            return array('status'=>'success', 'message'=>'Note updated successfull!');
       }catch(Exception $err){
            return response(array(
                'message'=>'Internal server error!',
                'error'=>$err
            ),500);
       }
    }

    public function show(Note $note)
    {
       
    }

  
    public function edit(Note $note)
    {
       
    }

    public function update(Request $request, Note $note)
    {
       
    }

    public function destroy(Note $note)
    {
       
    }
}
