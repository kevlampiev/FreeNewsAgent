<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class MakeViewAllArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE OR REPLACE VIEW v_articles_with_categories AS
                                SELECT a.*,c.id category, c.name category_name, c.slug
                                FROM articles a
                                INNER JOIN news_categories c ON a.category_id=c.id
                                ORDER BY rand()');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS  v_articles_with_categories ');
    }
}
