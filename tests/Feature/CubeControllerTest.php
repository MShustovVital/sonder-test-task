<?php

namespace Tests\Feature;

use App\Models\Cube;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CubeControllerTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function it_display_cube_route_available()
    {
       Cube::factory()->count(1)->create();
       $response = $this->get(route('cube.show'));
       $response->assertOk();
       $response->assertJsonStructure([
           'status',
           'data'=>[
               'cube'=>['Down','Front','Up','Back','Left','Right']
           ]
       ]);
    }

    /** @test */
    public function it_returns_not_found_error_when_cubes_not_exists()
    {
        $response = $this->get(route('cube.show'));
        $response->assertNotFound();
        $response->assertJsonStructure([
            'status',
            'message'
        ]);
    }

    /** @test */
    public function it_can_rotate_cube()
    {
        Cube::factory()->count(1)->create();
        $response = $this->post(route('cube.rotate'),['side'=>'L']);
        $response->assertOk();
        $response->assertJsonStructure([
            'status',
            'data'=>[
                'cube'=>['Down','Front','Up','Back','Left','Right']
            ]
        ]);
    }

    /** @test */
    public function it_can_not_rotate_cube_with_invalid_side()
    {
        Cube::factory()->count(1)->create();
        $response = $this->post(route('cube.rotate'),['side'=>'Left']);
        $response->assertStatus(422);
        $response->assertJsonStructure([
            'status',
            'errors'=>[
                'side'
            ]
        ]);
    }
}
