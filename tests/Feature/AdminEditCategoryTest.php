<?php

namespace Tests\Feature;

use App\Models\ArticlesCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\User;

class AdminEditCategoryTest extends TestCase
{
//    use WithoutMiddleware;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = User::query()->where('is_admin', true)->inRandomOrder()->first();
        $category=ArticlesCategory::query()->inRandomOrder()->first();
        $response = $this->actingAs($user)->get(route('admin.editCategory',['category'=>$category]));
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/html; charset=UTF-8');
        $response->assertSee('submit');
        $response->assertDontSee('alert');
    }
}
