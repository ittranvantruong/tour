<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesToToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places_to_tours', function (Blueprint $table) {
            $table->integer('place_id');
            $table->integer('tour_id');
            $table->timestamps();

            $table->foreign('place_id')->references('id')->on('places')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign('tour_id')->references('id')->on('tours')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places_to_tours');
    }
}
