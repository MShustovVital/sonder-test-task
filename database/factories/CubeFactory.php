<?php

namespace Database\Factories;

use App\Services\Cube\Entities\Cube;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cube>
 */
class CubeFactory extends Factory
{

    public function definition()
    {
        $data = Cube::generate();
        return ['data'=>$data];

        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

}
