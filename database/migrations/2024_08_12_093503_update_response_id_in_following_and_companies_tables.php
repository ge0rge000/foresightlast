<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateResponseIdInFollowingAndCompaniesTables extends Migration
{
    public function up()
    {
        Schema::table('following', function (Blueprint $table) {
            $table->dropForeign(['response_id']);
            $table->dropColumn('response_id');
        });

        Schema::table('companies', function (Blueprint $table) {
            $table->unsignedBigInteger('response_id')->nullable();

            $table->foreign('response_id')->references('id')->on('clientresponses')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('following', function (Blueprint $table) {
            $table->unsignedBigInteger('response_id')->nullable();

            $table->foreign('response_id')->references('id')->on('clientresponses')
                  ->onDelete('set null');
        });

        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign(['response_id']);
            $table->dropColumn('response_id');
        });
    }
}
