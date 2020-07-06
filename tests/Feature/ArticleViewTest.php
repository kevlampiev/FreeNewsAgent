<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleViewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testProperPath()
    {
        $response = $this->get('/categories/1/articles/1');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/html; charset=UTF-8');
        $response->assertSee('article-container shadowed-box');
        $response->assertSeeText('Ко всем новостям категории');
        $response->assertDontSee('Rails');
    }

    public function testWrongPath()
    {
        $response = $this->get('/categories/2/articles/1');
        $response->assertStatus(404);
    }
}
