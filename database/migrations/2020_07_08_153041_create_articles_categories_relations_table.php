<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesCategoriesRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_categories_relations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('article_id')->comment('ссылка на статью');
            $table->unsignedBigInteger('category_id')->comment('ссылка на категорию');
            $table->timestamps();
            $table->foreign('article_id')->on('articles')->references('id');
            $table->foreign('category_id')->on('news_categories')->references('id');
            $table->unique(['article_id','category_id'],'article_category_indx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles_categories_relations');
    }
}
