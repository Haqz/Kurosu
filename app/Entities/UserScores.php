<?php

namespace App\Entities;



use Illuminate\Database\Eloquent\Model;

class UserScores extends Model
{
    protected $table = 'scores';
    protected $fillable = [
        'beatmap_id', 'score', 'max_combo',
        'full_combo', 'mods', '300_count',
        '100_count', '50_count', 'katus_count',
        'gekis_count', 'miss_count', 'completed',
        'accuracy', 'pp',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
