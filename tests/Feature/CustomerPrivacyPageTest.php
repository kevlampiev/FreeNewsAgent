<?php

namespace Tests\Feature;

use App\Models\ArticlesCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\User;

class CustomerPrivacyPageTest extends TestCase
{
//    use WithoutMiddleware;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $category=ArticlesCategory::query()->inRandomOrder()->first();

        $response = $this->get(route('customer.articlesOfCategory',['slug'=>$category->slug]));
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/html; charset=UTF-8');
//        $response->assertSee('submit');
//        $response->assertDontSee('alert');
    }
}
