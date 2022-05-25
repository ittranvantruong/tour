<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('tour_id');
            $table->string('fullname');
            $table->string('phone');
            $table->string('email');
            $table->date('birthday');
            $table->integer('amount_customer');
            $table->string('payment_method');
            $table->foreign('tour_id')->references('id')->on('tours')->onUpdate('NO ACTION')->onDelete('CASCADE');
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
        Schema::dropIfExists('orders');
    }
}
