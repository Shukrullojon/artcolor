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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title_uz');
            $table->string('title_ru');
            $table->string('title_en');
            $table->string('title_short_uz');
            $table->string('title_short_ru');
            $table->string('title_short_en');
            $table->string('text_uz');
            $table->string('text_ru');
            $table->string('text_en');
            $table->string('image');
            $table->string('text_right_uz')->nullable();
            $table->string('text_right_ru')->nullable();
            $table->string('text_right_en')->nullable();
            $table->string('video_link')->nullable();
            $table->string('video_image')->nullable();
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
        Schema::dropIfExists('abouts');
    }
};
