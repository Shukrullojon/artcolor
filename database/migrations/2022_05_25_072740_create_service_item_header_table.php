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
        Schema::create('service_item_header', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id');
            $table->string('title_uz');
            $table->string('title_ru');
            $table->string('title_en');
            $table->string('button_uz');
            $table->string('button_ru');
            $table->string('button_en');
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
        Schema::dropIfExists('service_item_header');
    }
};
