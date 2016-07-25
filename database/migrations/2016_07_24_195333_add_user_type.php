<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function(Blueprint $table){
            $table->smallInteger('user_type_id');
        });

        Schema::create('user_types',function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->string('user_type');
            $table->boolean('is_admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('user_type_id');
        });
        Schema::table('user_types',function(Blueprint $table){
           $table->dropIfExists();
        });
    }
}
