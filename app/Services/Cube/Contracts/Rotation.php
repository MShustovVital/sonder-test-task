<?php

namespace App\Services\Cube\Contracts;

use App\Services\Cube\Enums\CubeRotation;

interface Rotation
{
    public function rotate(CubeRotation $direction):mixed;
}
