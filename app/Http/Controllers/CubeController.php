<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cube\RotateRequest;
use App\Services\Cube\CubeService;
use App\Services\Cube\DTO\CubeRequestDto;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

final class CubeController extends Controller
{
    public function index(CubeService $cubeService): JsonResponse
    {
        try {
            $cube = $cubeService->show();
            return $this->sendResponse(['cube'=>$cube]);
        } catch (ModelNotFoundException) {
            return $this->sendError();
        }
    }

    public function rotate(RotateRequest $request,CubeService $cubeService): JsonResponse
    {
        $data = CubeRequestDto::transform($request->validated());
        $cube = $cubeService->rotate($data->side);
        return $this->sendResponse(['cube'=>$cube]);
    }
}
