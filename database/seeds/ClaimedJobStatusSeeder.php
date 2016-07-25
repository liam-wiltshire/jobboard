<?php

use Illuminate\Database\Seeder;

class ClaimedJobStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('claimed_jobs_states')->truncate();
        DB::table('claimed_jobs_states')->insert([[
            'claimed_jobs_state' => 'claimed',
            'completed' => false
        ],[
            'claimed_jobs_state' => 'pending review',
            'completed' => false
        ],[
            'claimed_jobs_state' => 'accepted',
            'completed' => true
        ],[
            'claimed_jobs_state' => 'rejected',
            'completed' => false
        ]]);
    }
}
