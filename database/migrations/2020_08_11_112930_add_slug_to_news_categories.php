<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddSlugToNewsCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE news_categories ADD COLUMN slug VARCHAR(50) AFTER id');
        DB::statement('UPDATE news_categories SET slug=REPLACE(RIGHT(name,50)," ","_")');
        DB::statement('ALTER TABLE news_categories MODIFY COLUMN slug VARCHAR(50) UNIQUE NOT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE news_categories DROP COLUMN slug');
    }
}
