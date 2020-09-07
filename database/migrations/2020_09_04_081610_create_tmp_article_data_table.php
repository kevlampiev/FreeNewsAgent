<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTmpArticleDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmp_article_data', function (Blueprint $table) {
            $table->id();
            $table->string('category', 255)->nullable(false);
            $table->string('slug', 255)->nullable(false);
            $table->string('source', 255)->nullable(false);
            $table->string('title', 255)->nullable(false);
            $table->string('announcement', 255)->nullable(false);
            $table->text('article_body')->nullable(false);
            $table->string('img', 255);
            $table->boolean('is_private')->default(false);
            $table->string('link', 255);
            $table->string('guid', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tmp_article_data');
    }
}
