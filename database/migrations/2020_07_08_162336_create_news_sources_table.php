<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_sources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique('source_name_indx')->comment('Название источника');
            $table->string('http_address')->unique()->comment('Адрес в сети интернет');
            $table->text('description')->nullable()->comment('Комментарий');
            $table->string('default_category_name')->default('')->comment('Имя категории по умолчанию');
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
        Schema::dropIfExists('news_sources');
    }
}
