<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class AdminDashboardTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user=User::query()->where('is_admin',true)->inRandomOrder()->first();
        $response = $this->actingAs($user)->get(route('admin'));

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/html; charset=UTF-8');
//        $response->assertSee('newscategory shadowed-box'); //есть хотя бы одна категория новостей
    }
}
