<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestUserTableSeeder extends Seeder
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
            'email' => 'test@mir-ai.co.jp',
            'email_verified_at' => now(),
            'password' => bcrypt('111111'), 
            'name' => 'システム',
            'created_at' => now(),
        ]);
    }
}
