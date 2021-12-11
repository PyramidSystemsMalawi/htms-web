<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //Render the dashboard view
    public function index()
    {
        $userdata = array(
            'firstname' => "Clifford",
            'lastname' => "Mwale"
        );
        return view('pages.welcome')->with(array(
            'title' => 'Dashboard',
            'userdata'=>$userdata
        ));
    }
}
