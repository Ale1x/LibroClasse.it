<?php

use App\Http\Controllers\CittaController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\RegioneController;
use App\Http\Controllers\ScuolaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdozioneLibroController;



Route::get('/', [RegioneController::class, 'index']);
Route::get('/province/{region}', [ProvinciaController::class, 'index']);
Route::get('/city/{province}', [CittaController::class, 'index']);
Route::get('/schools/{school}', [ScuolaController::class, 'index']);
Route::get('/class/{class}', [ClasseController::class, 'index']);
Route::get('/books/{codiceScuola}/{class}', [AdozioneLibroController::class, 'index']);

