<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InfoEnquieryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testView()
    {
        $response = $this->get('/info-enquiery');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type','text/html; charset=UTF-8');
        $response->assertSee('submit');
        $response->assertDontSee('alert');
    }
}
