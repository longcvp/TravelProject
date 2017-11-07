<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('trip_id');
            $table->double('src_long');
            $table->double('src_lat');
            $table->string('src_name');
            $table->double('dest_long');
            $table->double('dest_lat');
            $table->string('dest_name');
            $table->date('ending_time');
            $table->string('vehicle');
            $table->text('activity');
            $table->date('start_time');
            $table->date('end_time');
            $table->integer('status');
            $table->string('cover_image',255);
            $table->integer('max_people');
            $table->integer('joined');
            $table->integer('followed');
            $table->integer('comments');
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
        Schema::dropIfExists('plans');
    }
}
