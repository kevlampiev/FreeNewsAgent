<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\ArticlesCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\User;

class AdminEditArticleTest extends TestCase
{
//    use WithoutMiddleware;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCorrectRoute()
    {
        $user = User::query()->where('is_admin', true)->limit(1)->first();
        $article = Article::query()->inRandomOrder()->first();
        $response = $this->actingAs($user)->get(route('admin.editArticle', [
            'slug' => $article->category->slug,
            'article'=>$article
        ]));
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/html; charset=UTF-8');
        $response->assertSee('submit');
        $response->assertDontSee('alert');
    }

    public function testIncorectRoute() {
        $user = User::query()->where('is_admin', true)->limit(1)->first();
        $article1 = Article::query()->inRandomOrder()->first();
        $article2 = Article::query()->where('category_id','<>',$article1->category_id)->inRandomOrder()->first();

        $response = $this->actingAs($user)->get(route('admin.editArticle', [
            'slug' => $article1->category->slug,
            'article'=>$article2
        ]));
        echo route('admin.editArticle', [
            'slug' => $article1->category->slug,
            'article'=>$article2
        ]);
        $response->assertStatus(200); //!!!!! У админа первична сама статья

    }
}
