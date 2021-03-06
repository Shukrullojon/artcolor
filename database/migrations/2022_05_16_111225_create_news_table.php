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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->integer('category_new_id');
            $table->string('title_uz');
            $table->string('title_ru');
            $table->string('title_en');
            $table->text('text_uz');
            $table->text('text_ru');
            $table->text('text_en');
            $table->string('slug')->nullable();
            $table->integer('type')->nullable();
            $table->string('image');
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
        Schema::dropIfExists('news');
    }
};
