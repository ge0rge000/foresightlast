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
            $table->date('date_recieve')->nullable(); // Replace 'existing_column_name' with the name of the column after which you want to add 'date_recieve'.

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
