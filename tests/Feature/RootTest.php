<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RootTest extends TestCase
{
    public $response;

//    public function __construct($name = null, array $data = [], $dataName = '')
////    {
////        parent::__construct($name, $data, $dataName);
//////        $this->response=$this->get('/');
////    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLoaded()
    {
        $response=$this->get('/');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type','text/html; charset=UTF-8');
        $response->assertSeeText('Последние новости');
    }

//    public function testContentType()
//    {
//        $this->response->assertSeeText('Последние новости');
//    }
}
