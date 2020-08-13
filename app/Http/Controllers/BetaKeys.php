<?php

namespace App\Http\Controllers;

use App\Entities\BetaKey;

class BetaKeys extends Controller
{
    public function index()
    {
        $items = BetaKey::all();

        return view('beta_keys', ['items'=>$items]);
    }
}
