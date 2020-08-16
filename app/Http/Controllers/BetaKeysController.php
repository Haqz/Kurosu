<?php

namespace App\Http\Controllers;

use App\Entities\BetaKey;

class BetaKeysController extends Controller
{
    public function index()
    {
        $items = BetaKey::all();

        return view('beta_keys', ['items'=>$items]);
    }
}