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
            $table->string('email',20);
            $table->string('timetable');
            $table->string('telegram');
            $table->string('youtube');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('title_uz');
            $table->string('title_ru');
            $table->string('title_en');
            $table->string('address_1_uz');
            $table->string('address_1_ru');
            $table->string('address_1_en');
            $table->string('address_2_uz');
            $table->string('address_2_ru');
            $table->string('address_2_en');
            $table->string('address_3_uz');
            $table->string('address_3_ru');
            $table->string('address_3_en');
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
