<?php

use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->truncate();
        DB::table('user_types')->insert([[
            'user_type' => 'user',
            'is_admin' => false
        ],[
            'user_type' => 'admin',
            'is_admin' => true
        ]]);
    }
}
