<?php

use App\Entities\BetaKey;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BetaKeysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bytes = [random_bytes(2),random_bytes(2),random_bytes(2),random_bytes(2)];

        DB::table('beta_keys')->insert([
            'key' => bin2hex($bytes[0]).'-'.bin2hex($bytes[1]).'-'.bin2hex($bytes[2]).'-'.bin2hex($bytes[3]),
            'is_allowed' => true,
            'is_public' => true
        ]);
    }
}
