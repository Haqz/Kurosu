<?php

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
        for($i = 0; $i<100;$i++){
            DB::table('scores')->insert([
                'user_id' => 1000,
                'pp' => rand(0,300)
            ]);
        }

    }
}
