<?php

namespace App\Http\Controllers;

use App\Entities\BetaKey;
use App\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginIndex()
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
    public function registerIndex()
    {
        $items = BetaKey::all();
        return view('register', ['items'=>$items]);
    }
    public function attemptRegister(Request $request)
    {
        $errors = [[]];
        $validator = Validator::make($request->all(), [
            'username' => 'required|alphaNum|min:4',
            'password' => 'required|min:3',
            'repeat-password' => 'required|min:3',
            'email' => 'required|email',
            'beta-key' => 'required',
        ]);

        if ($validator->fails()) {
            array_push($errors, $validator->errors()->all());
        }
        if(User::where('username', $request->get('username'))->first()){
            array_push($errors[0], 'Username already exists');
        }
        if(User::where('email', $request->get('email'))->first()){
            array_push($errors[0], 'Email already exists');
        }
        if($request->get('password') != $request->get('repeat-password')){
            array_push($errors[0], 'Passwords doesn\'t match');
        }
        if(!BetaKey::where('key', $request->get('beta-key'))->first()){
            array_push($errors[0], 'Incorrect beta-key');
        }
        if(BetaKey::select('is_allowed')->where('key', $request->get('beta-key'))->first()->is_allowed == false){
            array_push($errors[0], 'Invalid beta-key');
        }

        if(count($errors[0])>0){
            return back()->with('errors', $errors);
        }

        $key = BetaKey::where('key', $request->get('beta-key'))->first();
        $key->is_allowed = false;
        $key->save();

        User::insert([
            'username' => $request->get('username'),
            'password' => Hash::make($request->get('password')),
            'email' => $request->get('email'),
            'rank' => 4,
            'allowed' => 1
        ]);
        toastr()->success('Account created');
        return redirect('/');
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
