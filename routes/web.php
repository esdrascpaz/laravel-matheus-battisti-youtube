<?php

use App\Http\Controllers\EventosController;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventosController::class, 'index']);
Route::get('/events/create', [EventosController::class, 'create']);
Route::get('/events/{id}', [EventosController::class, 'show']);
// Action "store" por convenção
Route::post('/events', [EventosController::class, 'store']);
