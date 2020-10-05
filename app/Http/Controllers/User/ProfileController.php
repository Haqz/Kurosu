<?php

namespace App\Http\Controllers\User;


use App\Entities\User;
use App\Entities\UserScores;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

    public function index(int $id = null)
    {
        if($id){
            $user_scores = UserScores::where('user_id', $id)
                ->orderBy('pp', 'DESC')
                ->take(10)
                ->get();

            $user = User::where('id', $id)->with('stats')->first();
            if(!is_null($user)){
                return view('user/profile', ['user'=> $user, 'user_scores' => $user_scores]);
            } else{
                toastr()->error(__('user/main.not_found'));
                return back();
            }
        } else{
            toastr()->error(__('user/main.not_found'));
            return redirect('/');
        }
    }

}
