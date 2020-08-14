<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class BetaKey extends Model
{
    protected $table = 'beta_keys';

    protected $fillable = ['key', 'is_allowed', 'is_public'];
}
