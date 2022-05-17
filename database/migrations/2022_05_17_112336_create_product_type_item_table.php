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
        Schema::create('product_type_item', function (Blueprint $table) {
            $table->id();
            $table->integer('product_type_id');
            $table->string('title_uz');
            $table->string('title_ru');
            $table->string('title_en');
            $table->string('image');
            $table->string('button_url');
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
        Schema::dropIfExists('product_type_item');
    }
};
