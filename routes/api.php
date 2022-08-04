<?php

use App\Http\Controllers\CubeController;
use Illuminate\Support\Facades\Route;

Route::get('/cube',[CubeController::class,'index'])->name('cube.show');
Route::post('/cube/rotate',[CubeController::class,'rotate'])->name('cube.rotate');
