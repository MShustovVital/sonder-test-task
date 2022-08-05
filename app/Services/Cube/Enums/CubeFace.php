<?php

namespace App\Services\Cube\Enums;

enum CubeFace:string
{
    case Front = 'Front';
    case Left = 'Left';
    case Right = 'Right';
    case Back = 'Back';
    case Up = 'Up';
    case Down = 'Down';

    public static function getVerticalFacesNames():array
    {
        return [self::Down->name,self::Front->name,self::Up->name,self::Back->name];
    }

    public static function getHorizontalFacesNames():array
    {
        return [self::Down->name,self::Left->name,self::Up->name,self::Right->name];
    }
}
