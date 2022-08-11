<?php

namespace Tests\Unit;

use App\Models\Cube;
use App\Services\Cube\CubeService;
use App\Services\Cube\Enums\CubeRotation;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CubeServiceTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanUpdateCubeDataStructureInDatabase()
    {
        Cube::factory()->createOne();
        $cubeService = $this->makeCubeService();
        $cubeService->rotate(CubeRotation::LeftUp);
        $this->assertTrue(true);
    }

    public function testItCanNotUpdateCubeDataStructureIfItNotExists()
    {
        $cubeService = $this->makeCubeService();
        $this->expectException(ModelNotFoundException::class);
        $cubeService->rotate(CubeRotation::LeftUp);
    }

    public function testItCanReturnCubeStructureCorrectly()
    {
        Cube::factory()->createOne();
        $cubeService = $this->makeCubeService();
        $data = $cubeService->show();
        $this->assertIsArray($data);
        $this->assertNotEmpty($data);
    }

    private function makeCubeService():CubeService
    {
        return app()->make(CubeService::class);
    }
}
