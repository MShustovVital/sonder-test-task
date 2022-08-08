<?php

namespace App\Services\Cube;

use App\Services\Cube\Entities\Cube;
use App\Services\Cube\Entities\Cube as CubeEntity;
use App\Services\Cube\Contracts\Rotation;
use App\Services\Cube\Enums\CubeRotation;
use Illuminate\Database\Eloquent\Model;

final class CubeService implements Rotation
{
    public function __construct(private readonly Model $model)
    {

    }

    public function rotate(CubeRotation $direction): array
    {
        $data = $this->getCubeModelData();
        $cubeEntity = new CubeEntity($data);
        $cubeEntity->rotate($direction);
        $cubeData = $cubeEntity->get();
        $this->update($cubeData);
        return $this->getCubeModelData();
    }

    public function show(): array
    {
        return $this->getCubeModelData();
    }

    private function update(array $data): bool
    {
        return $this->getCube()->update(['data' => $data]);
    }

    private function getCubeModelData(): array
    {
        return $this->getCube()['data'];
    }

    private function getCube():Model
    {
        return $this->model->firstOrFail();
    }

}
