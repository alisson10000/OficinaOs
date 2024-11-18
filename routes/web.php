<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrdemServicoController;
use App\Http\Controllers\DashboardController;

// Redirecionar a rota inicial para login
Route::get('/', function () {
    return redirect()->route('login');
});

// Rotas de autenticação
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas protegidas pelo middleware 'auth'
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rotas de Ordem de Serviço
    Route::get('/ordem-servico', [OrdemServicoController::class, 'index'])->name('ordem-servico.index');
    Route::get('/ordem-servico/create', [OrdemServicoController::class, 'create'])->name('ordem-servico.create');
    Route::post('/ordem-servico', [OrdemServicoController::class, 'store'])->name('ordem-servico.store');
    Route::get('/ordem-servico/{id}', [OrdemServicoController::class, 'show'])->name('ordem-servico.show');
    Route::get('/ordem-servico/{id}/edit', [OrdemServicoController::class, 'edit'])->name('ordem-servico.edit');
    Route::put('/ordem-servico/{id}', [OrdemServicoController::class, 'update'])->name('ordem-servico.update');
    Route::delete('/ordem-servico/{id}', [OrdemServicoController::class, 'destroy'])->name('ordem-servico.destroy');
});
