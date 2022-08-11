<?php

namespace Database\Seeders;

use App\Models\Cube;
use Illuminate\Database\Seeder;

class CubeSeeder extends Seeder
{
    public function run():void
    {
        Cube::factory()->createOne();
    }
}
