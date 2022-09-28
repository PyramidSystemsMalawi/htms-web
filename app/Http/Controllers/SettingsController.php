<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\District;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::all();
        $userdata = Auth::user();
        return view('pages.settings.districts')->with([
            'title' => 'Districts',
            'userdata' => $userdata,
            'districts' => $districts
        ]);
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
        try {
            $check_district = District::where('district_name', '=', $request->district_name)->get();
            if ($check_district != null && count($check_district) > 0) {
                return redirect()->route('districts')
                    ->with('error', 'The provided district name already exist!');
            }
            $district = new District();
            $district->district_name = $request->district_name;
            $district->district_code = $request->district_code;

            $district->save();

            return redirect()->route('districts')
                ->with('success', $request->district_name . ' (' . $request->district_code . ') district added successfuly!');
        } catch (\Exception $err) {
            return redirect()->route('districts')
                ->with('error', 'Error: '.$err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
