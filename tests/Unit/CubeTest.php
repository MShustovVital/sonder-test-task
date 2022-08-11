<?php

namespace Tests\Unit;

use App\Services\Cube\Entities\Cube;
use App\Services\Cube\Enums\CubeColor;
use App\Services\Cube\Enums\CubeFace;
use App\Services\Cube\Enums\CubeRotation;
use Tests\TestCase;

class CubeTest extends TestCase
{
    public function testIsCubeGeneratesValid()
    {
        $expected = [CubeFace::Down->value =>
            [CubeColor::Blue->value, CubeColor::Blue->value, CubeColor::Blue->value,
                CubeColor::Blue->value, CubeColor::Blue->value, CubeColor::Blue->value,
                CubeColor::Blue->value, CubeColor::Blue->value, CubeColor::Blue->value
            ],
            CubeFace::Front->value =>
                [CubeColor::White->value, CubeColor::White->value, CubeColor::White->value,
                    CubeColor::White->value, CubeColor::White->value, CubeColor::White->value,
                    CubeColor::White->value, CubeColor::White->value, CubeColor::White->value
                ],
            CubeFace::Up->value =>
                [CubeColor::Green->value, CubeColor::Green->value, CubeColor::Green->value,
                    CubeColor::Green->value, CubeColor::Green->value, CubeColor::Green->value,
                    CubeColor::Green->value, CubeColor::Green->value, CubeColor::Green->value
                ],
            CubeFace::Back->value =>
                [CubeColor::Yellow->value, CubeColor::Yellow->value, CubeColor::Yellow->value,
                    CubeColor::Yellow->value, CubeColor::Yellow->value, CubeColor::Yellow->value,
                    CubeColor::Yellow->value, CubeColor::Yellow->value, CubeColor::Yellow->value
                ],
            CubeFace::Left->value =>
                [CubeColor::Orange->value, CubeColor::Orange->value, CubeColor::Orange->value,
                    CubeColor::Orange->value, CubeColor::Orange->value, CubeColor::Orange->value,
                    CubeColor::Orange->value, CubeColor::Orange->value, CubeColor::Orange->value
                ],
            CubeFace::Right->value =>
                [CubeColor::Red->value, CubeColor::Red->value, CubeColor::Red->value,
                    CubeColor::Red->value, CubeColor::Red->value, CubeColor::Red->value,
                    CubeColor::Red->value, CubeColor::Red->value, CubeColor::Red->value
                ],];
        $cube = Cube::generate();
        $this->assertEquals($expected, $cube);
    }

    public function testIsCubeTurnLeftFaceUpValid()
    {
        $expected = [CubeFace::Down->value =>
            [CubeColor::Yellow->value, CubeColor::Yellow->value, CubeColor::Yellow->value,
                CubeColor::Blue->value, CubeColor::Blue->value, CubeColor::Blue->value,
                CubeColor::Blue->value, CubeColor::Blue->value, CubeColor::Blue->value
            ],
            CubeFace::Front->value =>
                [CubeColor::Blue->value, CubeColor::Blue->value, CubeColor::Blue->value,
                    CubeColor::White->value, CubeColor::White->value, CubeColor::White->value,
                    CubeColor::White->value, CubeColor::White->value, CubeColor::White->value
                ],
            CubeFace::Up->value =>
                [CubeColor::White->value, CubeColor::White->value, CubeColor::White->value,
                    CubeColor::Green->value, CubeColor::Green->value, CubeColor::Green->value,
                    CubeColor::Green->value, CubeColor::Green->value, CubeColor::Green->value
                ],
            CubeFace::Back->value =>
                [CubeColor::Green->value, CubeColor::Green->value, CubeColor::Green->value,
                    CubeColor::Yellow->value, CubeColor::Yellow->value, CubeColor::Yellow->value,
                    CubeColor::Yellow->value, CubeColor::Yellow->value, CubeColor::Yellow->value
                ],
            CubeFace::Left->value =>
                [CubeColor::Orange->value, CubeColor::Orange->value, CubeColor::Orange->value,
                    CubeColor::Orange->value, CubeColor::Orange->value, CubeColor::Orange->value,
                    CubeColor::Orange->value, CubeColor::Orange->value, CubeColor::Orange->value
                ],
            CubeFace::Right->value =>
                [CubeColor::Red->value, CubeColor::Red->value, CubeColor::Red->value,
                    CubeColor::Red->value, CubeColor::Red->value, CubeColor::Red->value,
                    CubeColor::Red->value, CubeColor::Red->value, CubeColor::Red->value
                ],];
        $cube = (new Cube())->rotate(CubeRotation::LeftUp);
        $this->assertInstanceOf(Cube::class,$cube);
        $this->assertIsArray($cube->getStructure());
        $this->assertEquals($expected, $cube->getStructure());
    }

    public function testIsCubeTurnMiddleFaceUpValid()
    {
        $expected = [CubeFace::Down->value =>
            [CubeColor::Blue->value, CubeColor::Blue->value, CubeColor::Blue->value,
                CubeColor::Yellow->value, CubeColor::Yellow->value, CubeColor::Yellow->value,
                CubeColor::Blue->value, CubeColor::Blue->value, CubeColor::Blue->value
            ],
            CubeFace::Front->value =>
                [CubeColor::White->value, CubeColor::White->value, CubeColor::White->value,
                    CubeColor::Blue->value, CubeColor::Blue->value, CubeColor::Blue->value,
                    CubeColor::White->value, CubeColor::White->value, CubeColor::White->value
                ],
            CubeFace::Up->value =>
                [CubeColor::Green->value, CubeColor::Green->value, CubeColor::Green->value,
                    CubeColor::White->value, CubeColor::White->value, CubeColor::White->value,
                    CubeColor::Green->value, CubeColor::Green->value, CubeColor::Green->value
                ],
            CubeFace::Back->value =>
                [CubeColor::Yellow->value, CubeColor::Yellow->value, CubeColor::Yellow->value,
                    CubeColor::Green->value, CubeColor::Green->value, CubeColor::Green->value,
                    CubeColor::Yellow->value, CubeColor::Yellow->value, CubeColor::Yellow->value
                ],
            CubeFace::Left->value =>
                [CubeColor::Orange->value, CubeColor::Orange->value, CubeColor::Orange->value,
                    CubeColor::Orange->value, CubeColor::Orange->value, CubeColor::Orange->value,
                    CubeColor::Orange->value, CubeColor::Orange->value, CubeColor::Orange->value
                ],
            CubeFace::Right->value =>
                [CubeColor::Red->value, CubeColor::Red->value, CubeColor::Red->value,
                    CubeColor::Red->value, CubeColor::Red->value, CubeColor::Red->value,
                    CubeColor::Red->value, CubeColor::Red->value, CubeColor::Red->value
                ],];
        $cube = (new Cube())->rotate(CubeRotation::MiddleUp);
        $this->assertInstanceOf(Cube::class,$cube);
        $this->assertIsArray($cube->getStructure());
        $this->assertEquals($expected, $cube->getStructure());
    }

    public function testIsCubeTurnRightFaceUpValid()
    {
        $expected = [CubeFace::Down->value =>
            [CubeColor::Blue->value, CubeColor::Blue->value, CubeColor::Blue->value,
                CubeColor::Blue->value, CubeColor::Blue->value, CubeColor::Blue->value,
                CubeColor::Yellow->value, CubeColor::Yellow->value, CubeColor::Yellow->value
            ],
            CubeFace::Front->value =>
                [CubeColor::White->value, CubeColor::White->value, CubeColor::White->value,
                    CubeColor::White->value, CubeColor::White->value, CubeColor::White->value,
                    CubeColor::Blue->value, CubeColor::Blue->value, CubeColor::Blue->value
                ],
            CubeFace::Up->value =>
                [CubeColor::Green->value, CubeColor::Green->value, CubeColor::Green->value,
                    CubeColor::Green->value, CubeColor::Green->value, CubeColor::Green->value,
                    CubeColor::White->value, CubeColor::White->value, CubeColor::White->value
                ],
            CubeFace::Back->value =>
                [CubeColor::Yellow->value, CubeColor::Yellow->value, CubeColor::Yellow->value,
                    CubeColor::Yellow->value, CubeColor::Yellow->value, CubeColor::Yellow->value,
                    CubeColor::Green->value, CubeColor::Green->value, CubeColor::Green->value
                ],
            CubeFace::Left->value =>
                [CubeColor::Orange->value, CubeColor::Orange->value, CubeColor::Orange->value,
                    CubeColor::Orange->value, CubeColor::Orange->value, CubeColor::Orange->value,
                    CubeColor::Orange->value, CubeColor::Orange->value, CubeColor::Orange->value
                ],
            CubeFace::Right->value =>
                [CubeColor::Red->value, CubeColor::Red->value, CubeColor::Red->value,
                    CubeColor::Red->value, CubeColor::Red->value, CubeColor::Red->value,
                    CubeColor::Red->value, CubeColor::Red->value, CubeColor::Red->value
                ],];
        $cube = (new Cube())->rotate(CubeRotation::RightUp);
        $this->assertInstanceOf(Cube::class,$cube);
        $this->assertIsArray($cube->getStructure());
        $this->assertEquals($expected, $cube->getStructure());
    }

    public function testIsCubeNotGeneratedEmpty()
    {
        $this->assertNotEmpty((new Cube())->getStructure());
    }
}
