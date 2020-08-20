<?php

namespace App\Http\Controllers;

use App\Entities\BetaKey;
use App\Entities\User;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
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
    public function attemptLogin(LoginRequest $request)
    {

        $user_data = [
            'username' => $request->username,
            'password' => $request->password
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
        return view('register', ['items' => $items]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function attemptRegister(RegisterRequest $request)
    {
        $errors = [];
        $key = BetaKey::where('key', $request->get('beta-key'))->first();

        if($request->validator != null){
            array_push($errors, Arr::flatten($request->validator->messages()->all()));
        }

        if($request->password != $request['repeat-password']){
            array_push($errors, 'Passwords doesn\'t match');
        }
        if(!is_null($key) && $key->is_allowed == false){
            array_push($errors, 'Invalid beta-key');
        }
        if(count($errors)>0){
            return back()->with('errors', Arr::flatten($errors));
        }

        $key->is_allowed = false;
        $key->save();

        User::insert([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
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
