<?php

namespace App\Http\Controllers;
use App\Models\Qualifier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class QualifiersController extends Controller
{

    public function index()
    {
        $userdata = Auth::user();
        $qualifiers = Qualifier::all();
        return view('pages.qualifiers.list')->with(array(
            'title'=>'TIP CheckList',
            'userdata'=>$userdata,
            'qualifiers'=>$qualifiers
        ));
    }

    public function list()
    {
        $qualifiers = Qualifier::all();
        return $qualifiers;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {


        try {
            //code...
            $qualifier = new Qualifier();
            $qualifier->question = $request->question;
            $qualifier->responseType = $request->responseType;
            $qualifier->possible_answers =$request->possible_answers;

            if ($request->nullable == 'on') {
                $qualifier->nullable = true;
            } else {
                $qualifier->nullable = false;
            }

            $qualifier->save();
            return redirect()->route('qualifiers-list')->with('success', 'TIP Qualifier questionnaire updated!');
        } catch (Exception $err) {
            return redirect()->route('qualifiers-list')->with('success', 'Error while adding TIP Qualifier question!');
        }
    }

    public function show(qualifier $qualifier)
    {
        //
    }

    public function edit(qualifier $qualifier)
    {
        //
    }

    public function update(Request $request, qualifier $qualifier)
    {
        //
    }

    public function destroy(Request $request)
    {
        try{
            $qualifier = Qualifier::find($request->id);
            $qualifier->delete();
            return redirect()->route('qualifiers-list')->with('success','TIP Qualifier question deleted successfully!');
        }catch(Exception $err){
            return redirect()->route('qualifiers-list')->with('success', 'Error while deleting TIP Qualifier question!');
        }
    }
}
