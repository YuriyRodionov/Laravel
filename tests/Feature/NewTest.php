<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_news_one()
    {
        $id = mt_rand(1, 10);
        $response = $this->get('/news/' . $id);
        $response->assertStatus(200);
    }

    public function test_admin_news()
    {
        $response = $this->get('/admin/news');

        $response->assertStatus(200);
    }

    public function test_hello()
    {
        $response = $this->get('/hello');

        $response->assertStatus(200);
    }

    public function test_news_types()
    {
        $response = $this->get('/news/types');

        $response->assertStatus(200);
    }

    public function test_news_type()
    {
        $id = mt_rand(1, 4);
        $response = $this->get('/news/types/' . $id);
        $response->assertStatus(200);
    }


}
