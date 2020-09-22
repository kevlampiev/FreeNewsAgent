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
            $table->bigInteger('user_id')->nullable(false)->unsigned();
            $table->text('request_body')->nullable(false);
            $table->timestamps();
            $table->dateTime('answered')->nullable();
            $table->string('notes')->nullable();
//            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
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
