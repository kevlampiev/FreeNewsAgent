<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CustomerArticleViewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testProperPath()
    {
        $article = DB::table('v_articles_with_categories')->first();
        echo '/categories/' . $article->slug . '/articles/' . $article->id;
        $response = $this->get('/categories/' . $article->slug . '/articles/' . $article->id);
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/html; charset=UTF-8');
        $response->assertSee('article-container shadowed-box');
        $response->assertSeeText('Ко всем новостям категории');
        $response->assertDontSee('Rails');
    }

    public function testWrongPath()
    {
        $articles = DB::table('v_articles_with_categories')->limit(2)->get();

        $response = $this->get('/categories/' . $articles->first()->slug . '/articles/' . $articles->last()->id);
        $response->assertStatus(404);
    }
}
