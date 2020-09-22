<?php

namespace Tests\Feature;

use App\Models\ArticlesCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\User;

class AddArticleTest extends TestCase
{
//    use WithoutMiddleware;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = User::query()->where('is_admin', true)->limit(1)->first();
//        dd($user);
        $slug = ArticlesCategory::query()->first()->slug;
//        echo "admin/categories/$slug/articles/add";
        $response = $this->actingAs($user)->get("admin/categories/$slug/articles/add");
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/html; charset=UTF-8');
        $response->assertSee('submit');
        $response->assertDontSee('alert');
    }
}
