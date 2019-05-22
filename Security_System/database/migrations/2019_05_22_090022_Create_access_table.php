<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Access',function(Blueprint $table){
            $table->increments('id');
            $table->dateTime('time_entered');
            $table->dateTime('time_exited');
            $table->string('rfid_presented');
            $table->integer('access_granted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::DropIfExists('room_user');
    }
}
