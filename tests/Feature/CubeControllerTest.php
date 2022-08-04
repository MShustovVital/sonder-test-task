<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CubeControllerTest extends TestCase
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

    /**
     * @test
     */
    public function it_display_cube()
    {
        $response = $this->get(route('cube.show'));
        $response->assertStatus(200);

        $response->assertJson(['data' => ['cube' => [

        ]
        ]]);
    }

    /**
     * @test
     */
    public function it_can_rotate_cube()
    {
        $this->markTestIncomplete();
    }
}
