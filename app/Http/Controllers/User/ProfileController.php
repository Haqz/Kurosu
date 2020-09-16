<?php

namespace App\Http\Controllers\User;


use App\Entities\User;
use App\Http\Controllers\Controller;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
    }

    public function index(int $id)
    {
        if(isset($id)){
            $user = User::where('id', $id)->with('stats')->first();
            if(!is_null($user)){
                return view('user/profile', ['user'=> $user]);
            } else{
                toastr()->error('User with that id not found');
                return back();
            }
        } else{
            toastr()->error('No id provided');
        }
    }
    public function test(Request $request)
    {
        dd(Markdown::convertToHtml($request->opis));
    }

}
