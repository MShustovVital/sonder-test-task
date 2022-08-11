<?php

namespace App\Services\Cube\Contracts;

interface DTO
{
    public static function transform(mixed $args):self;
}
