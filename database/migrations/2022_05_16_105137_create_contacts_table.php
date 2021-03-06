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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('phone_1',20);
            $table->string('phone_2',20);
            $table->string('email',50);
            $table->string('timetable');
            $table->string('telegram');
            $table->string('youtube');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('title_uz');
            $table->string('title_ru');
            $table->string('title_en');
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
        Schema::dropIfExists('contacts');
    }
};
