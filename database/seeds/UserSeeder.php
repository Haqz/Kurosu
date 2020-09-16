<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = '';
        if(env('APP_ENV')){
            $password = 'admin_kurosu';
        } else{
            $password = Str::random(10);

        }
        error_log('admin password: '.$password);
        DB::table('users')->insert([
            'id' => 1000,
            'username' => 'admin',
            'password' => Hash::make($password),
            'email' => 'ku@ro.su',
            'rank' => 4,
            'allowed' => 1
        ]);
    }
}
