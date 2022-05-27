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
        Schema::create('portfolio_about', function (Blueprint $table) {
            $table->id();
            $table->string('info_uz');
            $table->string('info_ru');
            $table->string('info_en');
            $table->string('social_uz');
            $table->string('social_ru');
            $table->string('social_en');
            $table->string('link');
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
        Schema::dropIfExists('portfolio_about');
    }
};
