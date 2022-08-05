<?php

namespace Tests\Unit;

use App\Services\Cube\Enums\CubeFace;
use PHPUnit\Framework\TestCase;

class CubeFaceTest extends TestCase
{
    /** @test */
    public function is_cube_face_return_valid_list_of_vertical_faces()
    {
        $verticalFacesNames = CubeFace::getVerticalFacesNames();
        $this->assertIsArray($verticalFacesNames);
        $this->assertEquals([CubeFace::Down->value,CubeFace::Front->value,CubeFace::Up->value,CubeFace::Back->value],$verticalFacesNames);
    }

    /** @test */
    public function is_cube_face_return_valid_list_of_horizontal_faces()
    {
        $horizontalFacesNames = CubeFace::getHorizontalFacesNames();
        $this->assertIsArray($horizontalFacesNames);
        $this->assertEquals([CubeFace::Down->value,CubeFace::Left->value,CubeFace::Up->value,CubeFace::Right->value],$horizontalFacesNames);
    }
}
