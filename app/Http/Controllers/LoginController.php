<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //Create index function
    public function index()
    {
        return view('login');
    }
}
