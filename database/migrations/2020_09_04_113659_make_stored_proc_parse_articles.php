<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class MakeStoredProcParseArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Создание хранимой процедуры для переноса заготовок записей статей в базу
        DB::connection()->getPdo()->exec('
                CREATE PROCEDURE parse_articles()
                BEGIN
                    DECLARE rec_added INT(4);
                        START TRANSACTION;

                            INSERT INTO news_categories (name,slug,description,created_at)
                            SELECT DISTINCT category,slug,category,now() FROM tmp_article_data
                            WHERE slug NOT IN (SELECT slug FROM news_categories);

                            SELECT  count(*) INTO rec_added FROM v_articles_to_parse;
                            INSERT INTO articles(title,announcement,article_body,is_private,created_at,category_id,source_id,img,guid,link)
                            SELECT * FROM v_articles_to_parse;

                            DELETE FROM tmp_article_data;
                        COMMIT;
                END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS parse_articles;');
    }
}
