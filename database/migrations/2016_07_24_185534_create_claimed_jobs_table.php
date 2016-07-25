<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaimedJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claimed_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('job_id');
            $table->integer('user_id');
            $table->integer('claimed_jobs_state_id');
        });

        Schema::create('claimed_jobs_states', function (Blueprint $table){
            $table->increments('id');
            $table->text('claimed_jobs_state');
            $table->boolean('completed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('claimed_jobs');
        Schema::drop('claimed_jobs_states');
    }
}
