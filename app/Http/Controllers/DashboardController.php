<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Victim;
use App\Models\Cases;
use App\Models\Suspect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //Render the dashboard view
    public function index()
    {
        $userdata = Auth::user();
        $stats = array(
            'cases'=>count(Cases::all()),
            'victims' => count(Victim::all()),
            'suspects' => count(Suspect::all())
        );
        return view('pages.welcome')->with(array(
            'title' => 'Dashboard',
            'userdata'=>$userdata,
            'stats'=>$stats
        ));
    }
}
