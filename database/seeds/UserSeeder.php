<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();
        DB::table('users')->insert([[
            'name'    => 'Liam',
            'email'   => 'liam@w.iltshi.re',
            'password'=> bcrypt('AQS1jd1812!'),
            'user_type_id'=>2
        ],[
            'name'    => 'Mum',
            'email'   => 'rachhay79@gmail.com',
            'password'=> bcrypt('Harr15on'),
            'user_type_id'=>2
        ],[
            'name'    => 'Dad',
            'email'   => 'chrishay@gmail.com',
            'password'=> bcrypt('Ell10tt'),
            'user_type_id'=>2
        ],[
            'name'    => 'Elliott',
            'email'   => 'elshay@gmail.com',
            'password'=> bcrypt('Ell10tt'),
            'user_type_id'=>1
        ],[
            'name'    => 'Harrison',
            'email'   => 'hashay@gmail.com',
            'password'=> bcrypt('Harr15on'),
            'user_type_id'=>1
        ]]);
    }
}
