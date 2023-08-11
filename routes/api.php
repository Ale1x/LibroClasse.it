<?php

use App\Http\Controllers\AdozioneLibroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('throttle:5,1')->group(function () {
    Route::post('/{codiceScuola}', [AdozioneLibroController::class, 'getClassi']);
    Route::post('/{codiceScuola}/{classe}', [AdozioneLibroController::class, 'getLibri']);
});

route::get('/', [AdozioneLibroController::class, 'showApi']);

