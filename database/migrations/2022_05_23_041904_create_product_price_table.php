<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_price', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('litr_uz')->nullable();
            $table->string('litr_ru')->nullable();
            $table->string('litr_en')->nullable();
            $table->string('price_uz')->nullable();
            $table->string('price_ru')->nullable();
            $table->string('price_en')->nullable();
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
        Schema::dropIfExists('product_price');
    }
};
