<?php

namespace App\Http\Controllers;

use App\Entities\BetaKey;

class BetaKeysController extends Controller
{
    /**
     * BetaKeysController constructor.
     */
    public function __construct(){
        $this->middleware('verifyrank');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $items = BetaKey::all();

        return view('beta_keys', ['items'=>$items]);
    }
}
