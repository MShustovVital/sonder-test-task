<?php

use App\Http\Controllers\CubeController;
use Illuminate\Support\Facades\Route;

Route::get('/cube',[CubeController::class,'index']);
Route::post('/cube/rotate',[CubeController::class,'rotate']);
