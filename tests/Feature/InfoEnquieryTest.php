<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\User;

class InfoEnquieryTest extends TestCase
{
//    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testView()
    {
        $user = User::query()->first();
        $response = $this->actingAs($user)->get('info-enquiery');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/html; charset=UTF-8');
        $response->assertSee('submit');
        $response->assertDontSee('alert');
    }
}
