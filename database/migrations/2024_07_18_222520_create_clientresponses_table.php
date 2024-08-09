<?php
// database/migrations/xxxx_xx_xx_create_responses_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientResponsesTable extends Migration
{
    public function up()
    {
        Schema::create('clientresponses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type_response');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientresponses');
    }
}
