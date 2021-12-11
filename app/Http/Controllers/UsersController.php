<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //Render the view for the users page
    public function index()
    {
        return view('pages.users.create');
    }

    //Create user login pages
    public function login()
    {
        $data = array(
            'title'=>'Login'
        );
        return view('pages.users.login')->with($data);
    }

    public function authenticate(Request $request){
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $request->email)->first();
        if(!$user || $fields['password'] != $user->password){
            return response([
                'status'=>'error',
                'message'=>'Wrong username or password!'
            ], 401);
        }

        $token = $user->createToken('token')->plainTextToken;

        $response = [
            'status'=>'success',
            'message'=>'Login was successful!',
            'user'=>$user,
            'token'=>$token
        ];

        return response($response,201);
    }
}
