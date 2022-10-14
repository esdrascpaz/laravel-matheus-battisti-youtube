<?php

use App\Http\Controllers\EventosController;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventosController::class, 'index']);
// Rota só pode ser acessada por usuário autenticado
Route::get('/events/create', [EventosController::class, 'create'])->middleware('auth');
Route::get('/events/{id}', [EventosController::class, 'show']);
// Action "store" por convenção
Route::post('/events', [EventosController::class, 'store']);

// Rota criada após a instalação do Jetstream e livewire
// para autenticação
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
