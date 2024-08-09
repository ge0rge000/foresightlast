<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('receive_orders', function (Blueprint $table) {
            $table->text("serial")->nullable();
            $table->bigInteger('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->bigInteger('type_tool_id')->unsigned();
            $table->foreign('type_tool_id')->references('id')->on('type_tools')->onDelete('cascade');
            $table->bigInteger('indicator_equipment_id')->unsigned();
            $table->foreign('indicator_equipment_id')->references('id')->on('indicator_equipment')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('receive_orders', function (Blueprint $table) {
            //
        });
    }
};
