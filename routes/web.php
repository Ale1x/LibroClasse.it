<?php

use App\Http\Controllers\CittaController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\RegioneController;
use App\Http\Controllers\ScuolaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdozioneLibroController;



Route::get('/', [RegioneController::class, 'index']);
Route::get('/province/{region}', [ProvinciaController::class, 'index']);
Route::get('/citta/{province}', [CittaController::class, 'index']);
Route::get('/gradi/{city}', [GradoController::class, 'index']);
Route::get('/scuole/{region}/{grade}', [ScuolaController::class, 'index']);
Route::get('/classi/{school}', [ClasseController::class, 'index']);
Route::get('/libri/{codiceScuola}/{class}', [AdozioneLibroController::class, 'index']);
