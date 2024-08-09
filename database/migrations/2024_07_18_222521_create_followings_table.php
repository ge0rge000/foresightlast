<?php

// database/migrations/xxxx_xx_xx_create_following_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowingsTable  extends Migration
{
    public function up()
    {
        Schema::create('following', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('person_id')->unsigned();
            $table->bigInteger('response_id')->unsigned();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('person_id')->references('id')->on('contact_persons')->onDelete('cascade');
            $table->foreign('response_id')->references('id')->on('clientresponses')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('following');
    }
}
