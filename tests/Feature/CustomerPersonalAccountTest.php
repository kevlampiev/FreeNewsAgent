<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class CustomerPersonalAccountTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user=User::query()->inRandomOrder()->first();
        echo $user->email;
        $response = $this->actingAs($user)->get('/personal-account');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/html; charset=UTF-8');
        $response->assertSee('submit'); //есть кнопка ввода
        $response->assertSee('password_conf'); //есть кнопка ввода
//        $response->assertSee('(если требуется)'); //есть кнопка ввода
    }
}
