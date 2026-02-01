<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->updateOrInsert([
            'id' => 1,
        ],[
            'email' => 'obata@mir-ai.co.jp',
            'name' => 'ミライエ小幡',
            'password' => bcrypt('LaraM1ra1e'), 
            'updated_at' => now(), 
        ]);

    }
}
