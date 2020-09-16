<?php

namespace App\Entities;



use Illuminate\Database\Eloquent\Model;

class UserStats extends Model
{
    protected $table = 'users_stats';
    protected $fillable = [

    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
