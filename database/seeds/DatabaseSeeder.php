<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTypeSeeder::class);
        $this->call(JobStatusSeeder::class);
        $this->call(ClaimedJobStatusSeeder::class);
        $this->call(UserSeeder::class);
    }
}
