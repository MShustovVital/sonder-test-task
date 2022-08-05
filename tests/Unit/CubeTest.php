<?php

namespace Tests\Unit;

use App\Services\Cube\Entities\Cube;
use App\Services\Cube\Enums\CubeColor;
use App\Services\Cube\Enums\CubeFace;
use App\Services\Cube\Enums\CubeRotation;
use Tests\TestCase;

class CubeTest extends TestCase
{
    /** @test */
    public function is_cube_generates_valid()
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

    /** @test */
    public function is_cube_turn_left_face_up_valid()
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
        $this->assertIsArray($cube->get());
        $this->assertEquals($expected, $cube->get());
    }

    /** @test */
    public function is_cube_turn_middle_face_up_valid()
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
        $this->assertIsArray($cube->get());
        $this->assertEquals($expected, $cube->get());
    }

    /** @test */
    public function is_cube_turn_right_face_up_valid()
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
        $this->assertIsArray($cube->get());
        $this->assertEquals($expected, $cube->get());
    }

    /** @test */
    public function is_cube_not_generated_empty()
    {
        $this->assertNotEmpty((new Cube())->get());
    }

}
