<?php

// database/migrations/xxxx_xx_xx_create_companies_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_company');
            $table->bigInteger('activity_company')->unsigned();
            $table->bigInteger('government_id')->unsigned();
            $table->bigInteger('city_id')->unsigned();
            $table->string('address');
            $table->bigInteger('user_id_register')->unsigned();
            $table->timestamps();
            $table->foreign('activity_company')->references('id')->on('activities')->onDelete('cascade');
            $table->foreign('government_id')->references('id')->on('governorates')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('user_id_register')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
