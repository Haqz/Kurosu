<?php

namespace App\Http\Controllers;

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
            dd($validator->errors());
            return back()->with('errors', $validator->errors());
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
