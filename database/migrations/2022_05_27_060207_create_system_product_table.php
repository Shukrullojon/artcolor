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
        Schema::create('system_product', function (Blueprint $table) {
            $table->id();
            $table->integer('system_id');
            $table->string('title_uz');
            $table->string('title_ru');
            $table->string('title_en');
            $table->string('file');
            $table->string('image');
            $table->string('origin')->nullable();
            $table->string('mb')->nullable();
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
        Schema::dropIfExists('system_product');
    }
};
