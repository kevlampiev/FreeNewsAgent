<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class ArticlesOfCategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $slug=DB::table('news_categories')->first()->slug;
        $response = $this->get("/admin/categories/{{$slug}}/articles");

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/html; charset=UTF-8');
        $response->assertSee('article-box');
        $response->assertSeeInOrder(['article-box', 'article-main-bloc', 'article-control-block', 'article-control-link']);
        $response->assertDontSee('Rails');
    }
}
