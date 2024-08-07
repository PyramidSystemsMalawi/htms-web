<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Victim;
use App\Models\Cases;
use App\Models\Suspect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // Render the dashboard view
    public function index()
    {
        $userdata = Auth::user();
        $stats = array(
            'cases' => Cases::count(),
            'victims' => Victim::count(),
            'suspects' => Suspect::count(),
        );

        // Query to get the top districts with the highest number of cases
        $topDistricts = DB::table('cases')
            ->select('cases.district', DB::raw('count(cases.id) as total_cases'))
            ->groupBy('cases.district')
            ->orderBy('total_cases', 'desc')
            ->limit(10)
            ->get();

        return view('pages.welcome')->with(array(
            'title' => 'Dashboard',
            'userdata' => $userdata,
            'stats' => $stats,
            'topDistricts' => $topDistricts,
        ));
    }
}
