<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Organisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //Render the view for the users page
    public function index()
    {
        $usersList = User::leftjoin('organisations', 'organisations.id', '=', 'users.organisation')
        ->join('roles', 'roles.id', '=','users.role')->where('users.status', '!=', 'DELETED')
        ->get(['users.*', 'organisations.organisation_name','roles.role_name']);
        $roles = Role::all();
        $organisations = Organisation::all();
        $userdata = Auth::user();
        //var_dump($organisations);
        return view('pages.users.list')->with(array(
            'title'=>'Users',
            'userdata'=>$userdata,
            'users'=>$usersList,
            'roles'=>$roles,
            'organisations'=>$organisations
        ));
    }

    public function store(Request $request){

        try{
            $user = new User();
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->organisation = $request->organisation;



            $user->save();

            return array(
                        'status'=>'success',
                        'message'=>'User account created succesfully!',
                        'data'=>array(
                            'username'=>$user->email,
                            'password'=>$user->password
                        )
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

    public function create(Request $request){
        try{
            $user = new User();
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->organisation = $request->organisation;

            $clearTextPassword = Str::random(10);
            $user->password = Hash::make($clearTextPassword);

            $user->save();
        }catch(Exception $err){

        }
        finally{
            return redirect()->route('users_list');
        }
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
        Session::put('isLoggedIN', $user);

        $response = [
            'status'=>'success',
            'message'=>'Login was successful!',
            'user'=>$user,
            'token'=>$token
        ];

        return response($response,201);
    }

    public function destroy(Request $request, $id){

        $user = User::find($id)->update(['status'=>'DELETED']);

        return redirect()->route('users_list');
    }
}
