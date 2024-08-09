<?php

// database/migrations/xxxx_xx_xx_create_cities_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('governorate_id')->unsigned();
            $table->string('city_name_ar', 200);
            $table->string('city_name_en', 200);
            $table->timestamps();

            $table->foreign('governorate_id')->references('id')->on('governorates')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
