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
        Schema::table('following', function (Blueprint $table) {
            $table->enum('typefollow', ['visit', 'call'])->after('comments');
            $table->time('time_calling')->nullable()->after('typefollow');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('following', function (Blueprint $table) {
            //
        });
    }
};
