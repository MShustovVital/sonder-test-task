<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cube\RotateRequest;
use App\Services\Cube\CubeService;
use App\Services\Cube\DTO\CubeRequestDto;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

final class CubeController extends Controller
{
    public function __construct(private CubeService $cubeService)
    {

    }

    public function index(): JsonResponse
    {
        try {
            $cube = $this->cubeService->show();
            return $this->sendResponse(['cube'=>$cube]);
        } catch (ModelNotFoundException) {
            return $this->sendError();
        }
    }

    public function rotate(RotateRequest $request): JsonResponse
    {
        $data = CubeRequestDto::transform($request->validated());
        $cube = $this->cubeService->rotate($data->side);
        return $this->sendResponse(['cube'=>$cube]);
    }
}
