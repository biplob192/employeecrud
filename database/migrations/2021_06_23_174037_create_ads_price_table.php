<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_price', function (Blueprint $table) {
            $table->id();
            $table->enum('ads_type', ['govt', 'private','commercial']);
            $table->enum('ads_position', ['front', 'back','inner','inner_color']);
            $table->integer('price');
            $table->integer('extra_charge');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('ads_price');
    }
}
