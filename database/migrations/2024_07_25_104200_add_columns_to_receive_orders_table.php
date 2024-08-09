<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToReceiveOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('receive_orders', function (Blueprint $table) {
        
        });
    }

    public function down()
    {
        Schema::table('receive_orders', function (Blueprint $table) {
            $table->dropColumn('guarantee_status');
            $table->dropColumn('case_status');
            $table->dropColumn('company_id');
        });
    }
}
