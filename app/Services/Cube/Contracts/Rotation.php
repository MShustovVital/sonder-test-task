<?php

namespace App\Services\Cube\Contracts;

interface Rotation
{
    public function rotate(mixed $data, string $direction):void;
}
