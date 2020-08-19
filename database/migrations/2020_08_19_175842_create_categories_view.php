<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE OR REPLACE VIEW v_categories  AS
            SELECT c.id, c.slug, c.name, c.description, c.created_at, c.updated_at, COUNT(a.id) articles_count
            FROM news_categories c
            LEFT JOIN articles a ON a.category_id=c.id
            GROUP BY c.id, c.slug, c.name, c.description
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS v_categories");
    }
}
