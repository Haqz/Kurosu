<?php

namespace App\Http\Controllers;

use App\Entities\BetaKey;
use App\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loginIndex()
    {
        return view('login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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

    /**
     * @return \Illuminate\View\View
     */
    public function registerIndex()
    {
        $items = BetaKey::all();
        return view('register', ['items'=>$items]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function attemptRegister(Request $request)
    {
        $errors = [];
        $key = BetaKey::where('key', $request->get('beta-key'))->first();

        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users|alphaNum|min:4',
            'password' => 'required|min:3',
            'repeat-password' => 'required|min:3',
            'email' => 'required|unique:users|email',
            'beta-key' => 'required|exists:beta_keys,key',
        ]);

        if ($validator->fails()) {
            array_push($errors, Arr::flatten($validator->messages()->get('*')));
        }
        if($request->get('password') != $request->get('repeat-password')){
            array_push($errors[0], 'Passwords doesn\'t match');
        }
        if(!is_null($key) && $key->is_allowed == false){
            array_push($errors[0], 'Invalid beta-key');
        }
        if(count($errors[0])>0){
            return back()->with('errors', Arr::flatten($errors));
        }

        $key->is_allowed = false;
        $key->save();

        User::insert([
            'username' => $request->get('username'),
            'password' => Hash::make($request->get('password')),
            'email' => $request->get('email'),
            'rank' => 1,
            'allowed' => 1
        ]);
        toastr()->success('Account created');
        return redirect('/');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        if(Auth::check()){
            Auth::logout();
            toastr()->success('Successfully logged out');
            return redirect('/');
        }
    }

    /**
     * @return string
     */
    public function username()
    {
        return 'username';
    }
}
