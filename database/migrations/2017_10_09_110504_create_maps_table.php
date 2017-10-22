<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plan_id');
            $table->float('start_lat');
            $table->float('start_lng');
            $table->string('start_name',255);
            $table->float('end_lat');
            $table->float('end_lng');
            $table->string('end_name',255);
            $table->integer('time');
            $table->string('activity',255);
            $table->string('move_vehicle',255);
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
        Schema::dropIfExists('maps');
    }
}
