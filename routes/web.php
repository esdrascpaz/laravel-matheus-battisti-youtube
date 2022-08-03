<?php

use App\Http\Controllers\EventosController;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventosController::class, 'index']);
Route::get('/eventos/criarEvento', [EventosController::class, 'criarEvento']);
// Action "store" por convenção
Route::post('/eventos', [EventosController::class, 'store']); 

// "id" deve ter valor padrão, para o caso da url vir sem parâmetro
