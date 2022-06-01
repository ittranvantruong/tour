<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntroduceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('introduce', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('introduce_id')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('avatar')->nullable();
            $table->longText('content')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();

            $table->foreign('introduce_id')->references('id')->on('category_introduce')->onUpdate('NO ACTION')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('introduce');
    }
}
