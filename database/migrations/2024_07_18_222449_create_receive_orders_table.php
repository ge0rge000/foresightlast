<?php

// database/migrations/xxxx_xx_xx_create_receive_orders_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiveOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('receive_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('equipment_id')->unsigned();
            $table->string('name_person');
            $table->string('number_person');
            $table->string('another_number_person')->nullable();
            $table->bigInteger('company_id')->unsigned();
            $table->enum('guarantee_status', ['1', '0'])->default('0');
            $table->enum('case_status', ['Receive', 'Deliver'])->default('Receive');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('equipment_id')->references('id')->on('equipments')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('receive_orders');
    }
}
