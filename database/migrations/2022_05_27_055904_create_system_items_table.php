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
        Schema::create('system_items', function (Blueprint $table) {
            $table->id();
            $table->integer('system_id');
            $table->string('title_uz');
            $table->string('title_ru');
            $table->string('title_en');
            $table->text('info_uz');
            $table->text('info_ru');
            $table->text('info_en');
            $table->string('image');
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
        Schema::dropIfExists('system_items');
    }
};
