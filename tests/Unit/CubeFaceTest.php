<?php

namespace Tests\Unit;

use App\Services\Cube\Enums\CubeFace;
use PHPUnit\Framework\TestCase;

class CubeFaceTest extends TestCase
{
    public function testIsCubeFaceReturnValidListOfVerticalFaces()
    {
        $verticalFacesNames = CubeFace::getVerticalFacesNames();
        $this->assertIsArray($verticalFacesNames);
        $this->assertEquals([CubeFace::Down->value,CubeFace::Front->value,CubeFace::Up->value,CubeFace::Back->value],$verticalFacesNames);
    }

    public function testIsCubeFaceReturnValidListOfHorizontalFaces()
    {
        $horizontalFacesNames = CubeFace::getHorizontalFacesNames();
        $this->assertIsArray($horizontalFacesNames);
        $this->assertEquals([CubeFace::Down->value,CubeFace::Left->value,CubeFace::Up->value,CubeFace::Right->value],$horizontalFacesNames);
    }
}
