<?php

namespace Tests\Feature;

use App\Models\InfoSource;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class AdminEditSourceTest extends TestCase
{
//    use WithoutMiddleware;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = User::query()->where('is_admin',true)->inRandomOrder()->first();
        $infoSource = InfoSource::query()->inRandomOrder()->first();
        $response = $this->actingAs($user)->get(route('admin.editInfoSource',['source'=>$infoSource]));

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/html; charset=UTF-8');
    }
}
