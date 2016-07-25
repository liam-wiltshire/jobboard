<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('user_id');
            $table->timestamps();
            $table->text('job');
            $table->longText('description');
            $table->smallInteger('jobs_state_id');
            $table->decimal('price',4,2);
        });

        Schema::create('jobs_states', function (Blueprint $table){
            $table->increments('id');
            $table->text('jobs_state');
            $table->boolean('claimable');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('jobs');
        Schema::drop('jobs_states');
    }
}
