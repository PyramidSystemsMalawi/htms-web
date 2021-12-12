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

    public function store(Request $request){
        
        try{
            $user = new User();
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->passord = $request->password;
            $user->role = $request->role;

            $user->save();

            return array(
                        'status'=>'success',
                        'message'=>'User account created succesfully!'
                    );
        }catch(Exception $err){
            return array('status'=>'error','message'=>'Failed to create new user account!','error'=>$err);
        }


    }

    //Get all users
    public function all(){
        $users = User::all();
        return array(
            'status'=>'success',
            'message'=>count($users).' Users found!',
            'data'=>$users
        );
    }

    //Find single user by ID
    public function find(Request $request){

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
