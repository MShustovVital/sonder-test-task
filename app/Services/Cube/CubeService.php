<?php

namespace App\Services\Cube;

use App\Models\Cube as CubeModel;
use App\Services\Cube\Entities\Cube;
use App\Services\Cube\Entities\Cube as CubeEntity;
use App\Services\Cube\Contracts\Rotation;
use App\Services\Cube\Enums\CubeRotation;

final class CubeService implements Rotation
{
    public function __construct(private readonly CubeModel $cubeModel)
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

    private function getCube():CubeModel
    {
        return $this->cubeModel->firstOrFail();
    }

}
