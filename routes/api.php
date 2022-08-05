<?php

use App\Http\Controllers\CubeController;
use Illuminate\Support\Facades\Route;

Route::post('/cube/rotate',[CubeController::class,'rotate'])->name('cube.rotate');
Route::get('/cube',[CubeController::class,'index'])->name('cube.show');
