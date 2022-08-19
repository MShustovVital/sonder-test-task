<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function sendResponse(array $data, int $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json(['status' => 'success', 'data' => $data], $code);
    }

    protected function sendError(string $message = 'Not found', int $code = Response::HTTP_NOT_FOUND): JsonResponse
    {
        return response()->json(['status' => 'error', 'message' => $message], $code);
    }

}
