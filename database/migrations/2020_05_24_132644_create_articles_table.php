<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable(false)->comment('Заголовок новости');
            $table->string('announcement')->nullable(false)->comment('Краткое содержание новости');
            $table->text('article_body')->nullable()->comment('Текст статьи');
            $table->boolean('is_private')->default(true)->comment('Доступно ли содержание для неактивириванных');
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
        Schema::dropIfExists('articles');
    }
}
