<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusStopScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_stop_schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bus_id')->unsigned();
            $table->integer('bus_stop_id')->unsigned();
            $table->enum('day',['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday']);
            $table->string('time');
            $table->string('description')->nullable();
            $table->foreign('bus_id')->references('id')->on('bus');
            $table->foreign('bus_stop_id')->references('id')->on('bus_stop');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bus_stop_schedule');
    }
}
