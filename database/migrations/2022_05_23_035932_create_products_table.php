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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('sub_category_id');
            $table->integer('filter_id');
            $table->string('title_uz');
            $table->string('title_ru');
            $table->string('title_en');
            $table->text('info_uz');
            $table->text('info_ru');
            $table->text('info_en');
            $table->string('application_uz')->comment('ПРИМЕНЕНИЕ');
            $table->string('application_ru');
            $table->string('application_en');
            $table->string('compound_uz')->comment('СОСТАВ');
            $table->string('compound_ru');
            $table->string('compound_en');
            $table->string('consumption_uz')->comment('РАСХОД');
            $table->string('consumption_ru');
            $table->string('consumption_en');
            $table->text('peculiarit_uz')->comment('Особенности');
            $table->text('peculiarit_ru');
            $table->text('peculiarit_en');
            $table->string('accordion_title_uz');
            $table->string('accordion_title_ru');
            $table->string('accordion_title_en');
            $table->text('accordion_info_uz');
            $table->text('accordion_info_ru');
            $table->text('accordion_info_en');
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
        Schema::dropIfExists('products');
    }
};
