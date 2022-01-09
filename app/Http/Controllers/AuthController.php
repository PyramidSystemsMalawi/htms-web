<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function doLogin(Request $request)
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
            ->withErrors($validator); // send back all errors to the login form
            //->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'email'     => $request->email,
                'password'  => $request->password
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {

                $user = Auth::user();

                return redirect()->route('dashboard');

            } else {

                // validation not successful, send back to form
                return Redirect::to('login')->withErrors([
                    'access_denied'=>'Wrong username or password!'
                ]);
            }
        }
    }


}
