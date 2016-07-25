<?php

use Illuminate\Database\Seeder;

class JobStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        DB::table('jobs_states')->truncate();
        DB::table('jobs_states')->insert([[
            'jobs_state' => 'open',
            'claimable' => true
        ],[
            'jobs_state' => 'claimed',
            'claimable' => false
        ],[
            'jobs_state' => 'closed',
            'claimable' => false
        ]]);
    }
}
