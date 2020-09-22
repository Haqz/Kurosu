<?php

namespace App\Http\Controllers\User;


use App\Entities\User;
use App\Http\Controllers\Controller;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index(int $id = null)
    {
        if($id != null){
            $user = User::where('id', $id)->with('stats')->first();
            if(!is_null($user)){
                return view('user/profile', ['user'=> $user]);
            } else{
                toastr()->error('User with that id not found');
                return back();
            }
        } else{
            toastr()->error('No id provided');
            return redirect('/');
        }
    }

}
