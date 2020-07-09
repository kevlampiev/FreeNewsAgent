<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_requests', function (Blueprint $table) {
            //
            $table->bigIncrements('id');
            $table->string('user_name')->nullable(false);
            $table->string('phone')->nullable(false);
            $table->string('email')->nullable(false);
            $table->text('request_body')->nullable(false);
            $table->timestamps();
            $table->dateTime('ansered')->nullable();
            $table->string('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_requests');
    }
}
