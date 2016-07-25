<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('job_id');
            $table->integer('user_id');
            $table->longText('comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('job_reviews');
    }
}
