<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('avatar')->nullable();
            $table->double('price')->default(0);
            $table->double('price_promotion')->nullable();
            $table->integer('place_from')->nullable();
            $table->longText('description')->nullable();
            $table->longText('term')->nullable();
            $table->longText('regulation')->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('is_feature')->default(false);
            $table->boolean('is_promotion')->default(false);
            $table->timestamps();

            // $table->foreign('category_id')->references('id')->on('category_tour')->onUpdate('NO ACTION')->onDelete('SET NULL');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
    }
}
