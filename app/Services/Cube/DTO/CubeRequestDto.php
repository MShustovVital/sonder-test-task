<?php

namespace App\Services\Cube\DTO;

use App\Services\Cube\Contracts\DTO;
use App\Services\Cube\Enums\CubeRotation;

final class CubeRequestDto implements DTO
{

    public CubeRotation $side;

    public static function transform(mixed $args): DTO
    {
        $dto = new self();
        $dto->side = self::filterCubeRotationByValue($args['side']);
        return $dto;
    }

    protected static function filterCubeRotationByValue(string $side): CubeRotation
    {
        $cubeRotationCases = CubeRotation::cases();
        return collect($cubeRotationCases)->search(function ($data) use ($side){
           return $data->value=== $side;
        })->first();
    }

}
