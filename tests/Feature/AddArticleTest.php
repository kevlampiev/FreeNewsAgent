<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddArticleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/categories/1/articles/add');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type','text/html; charset=UTF-8');
        $response->assertSee('submit');
        $response->assertDontSee('alert');
    }

//    public function testPushSave() {
//        $response = $this->get('/categories/1/articles/add');
//        $response->visit('/categories/1/articles/add')
//            ->click('Сохранить')
//            ->assertSeeText('The title field is required');
//
//    }
}
