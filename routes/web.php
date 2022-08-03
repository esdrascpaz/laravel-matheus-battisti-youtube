<?php

use App\Http\Controllers\EventosController;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventosController::class, 'index']);
Route::get('/eventos/create', [EventosController::class, 'create']);
Route::get('/eventos/{$id}', [EventosController::class, 'show']);
// Action "store" por convenção
Route::post('/eventos', [EventosController::class, 'store']);
