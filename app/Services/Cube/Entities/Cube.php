<?php

namespace App\Services\Cube\Entities;

use App\Services\Cube\Contracts\Rotation;
use App\Services\Cube\Enums\CubeColor;
use App\Services\Cube\Enums\CubeFace;
use App\Services\Cube\Enums\CubeRotation;
use JetBrains\PhpStorm\ArrayShape;

class Cube implements Rotation
{

    public function __construct(private array $data = [])
    {
        if(empty($data)) {
            $this->data = self::generate();
        }
    }

    public function get(): array
    {
        return $this->data;
    }

    public static function generate(): array
    {
        return [
            CubeFace::Down->value => self::fillFace(CubeColor::Blue),
            CubeFace::Front->value => self::fillFace(CubeColor::White),
            CubeFace::Up->value => self::fillFace(CubeColor::Green),
            CubeFace::Back->value => self::fillFace(CubeColor::Yellow),
            CubeFace::Left->value => self::fillFace(CubeColor::Orange),
            CubeFace::Right->value => self::fillFace(CubeColor::Red),
        ];
    }

    public function rotate(CubeRotation $direction): self
    {
        if(empty($data)) {
            $this->data = self::generate();
        }
        switch ($direction) {
            case CubeRotation::LeftUp:
                $this->turnLeftSideUp();
                break;
            case CubeRotation::MiddleUp:
                $this->turnMiddleSideUp();
                break;
            case CubeRotation::RightUp:
                $this->turnRightSideUp();
                break;
        }
        return $this;

    }

    private function turnLeftSideUp(): void
    {
        $topSideFaces = $this->getTopSideFacesFromCube();
        $swap = $this->calculateOffset(0,3,$topSideFaces);

        $this->setUpFacesToCube($swap);
    }

    private function turnMiddleSideUp(): void
    {
        $topSideFaces = $this->getTopSideFacesFromCube();
        $swap = $this->calculateOffset(3,6,$topSideFaces);

        $this->setUpFacesToCube($swap);
    }

    private function turnRightSideUp(): void
    {
       $topSideFaces = $this->getTopSideFacesFromCube();
       $swap = $this->calculateOffset(6,9 ,$topSideFaces);
       $this->setUpFacesToCube($swap);
    }

    public function calculateOffset(int $minIndex, int $maxIndex, array $data):array
    {
        $swap = [];
        for ($i = 0; $i < 4; $i++) {
            for ($j = 0; $j < 9; $j++) {
                if ($j >= $minIndex && $j < $maxIndex) {
                    if ($i >= 3) {
                        $swap[0][$j] = $data[$i][$j];
                    } else {
                        $swap[$i + 1][$j] = $data[$i][$j];

                    }
                } else {
                    $swap[$i][$j] = $data[$i][$j];
                }

            }
        }
        return $swap;
    }

    private function setUpFacesToCube(array $facelets):void
    {
        $formattedFaces = $this->formatFacesStructure($facelets);
        $this->data[CubeFace::Down->value] = $formattedFaces[CubeFace::Down->value];
        $this->data[CubeFace::Front->value] = $formattedFaces[CubeFace::Front->value];
        $this->data[CubeFace::Up->value] = $formattedFaces[CubeFace::Up->value];
        $this->data[CubeFace::Back->value] = $formattedFaces[CubeFace::Back->value];
    }

    #[ArrayShape(['Down' => "mixed", 'Front' => "mixed", 'Up' => "mixed", 'back' => "mixed"])]
    private function formatFacesStructure(array $facelets):array
    {
        $facelets = array_map(function ($element) {
            ksort($element);
            return $element;
        }, $facelets);
        ksort($facelets);

        return [
            CubeFace::Down->value => $facelets[0], CubeFace::Front->value => $facelets[1], CubeFace::Up->value => $facelets[2], CubeFace::Back->value => $facelets[3]
        ];
    }

    private function getTopSideFacesFromCube(): array
    {
        $cube = $this->data;
        $verticalFacesNames = CubeFace::getVerticalFacesNames();
        $data = [];
        foreach ($verticalFacesNames as $verticalFaceNameIndex => $position) {
            foreach ($cube[$position] as $key => $color) {
                $data[$verticalFaceNameIndex][$key] = $color;
            }
        }
        return $data;
    }

    private static function fillFace(CubeColor $color): array
    {
        return array_fill(0, 9, $color->value);
    }
}
