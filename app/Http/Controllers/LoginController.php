<?php

namespace App\Http\Controllers;

use App\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function attemptLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }
        if(!User::where('username', $request->get('username'))->first()){
            return back()->with('error', 'No user found');
        }
        $user_data = [
            'username' => $request->get('username'),
            'password' => $request->get('password')
        ];
        if(Auth::attempt($user_data)){
            toastr()->success('Successfully logged in');
            return redirect('/');
        } else{
            return back()->with('error', 'Wrong details');
        }
    }
    public function logout()
    {
        if(Auth::check()){
            Auth::logout();
            toastr()->success('Successfully logged out');
            return redirect('/');
        }
    }
    public function username()
    {
        return 'username';
    }
}
