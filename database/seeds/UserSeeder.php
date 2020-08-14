<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('sK3zLYUG'),
            'email' => 'ku@ro.su',
            'rank' => 4,
            'allowed' => 1
        ]);
    }
}
