<?php

use App\Entities\BetaKey;
use App\Entities\UserScores;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ScoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(env('APP_ENV') == 'local'){
            for($i = 0; $i<50;$i++){
                UserScores::create([
                    'beatmap_id' => 123,
                    'user_id' => 1000,
                    'score' => rand(0,3000),
                    'max_combo' => rand(0,500),
                    'full_combo' => true,
                    'mods' => 1,
                    '300_count' => rand(0,500),
                    '100_count' => rand(0,500),
                    '50_count' => rand(0,500),
                    'katus_count' => rand(0,500),
                    'gekis_count' => rand(0,500),
                    'miss_count' => rand(0,500),
                    'completed' => 1,
                    'accuracy' => rand(0,100),
                    'pp' => rand(0,300)
                ]);
            }
        }
    }
}
