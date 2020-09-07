<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateViewVArticlesToParse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            CREATE OR REPLACE view v_articles_to_parse AS
                SELECT tmp.title,
                    tmp.announcement,
                    tmp.article_body,
                    tmp.is_private,
                    tmp.created_at,
                    c.id category_id,
                    s.id source_id,
                    tmp.img,
                    tmp.guid,
                    tmp.link
                FROM tmp_article_data tmp
                INNER JOIN news_categories c ON tmp.slug=c.slug
                INNER JOIN news_sources s ON tmp.source=s.http_address
                WHERE tmp.guid NOT IN
                (SELECT guid FROM articles);
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS v_articles_to_parse ;');
    }
}
