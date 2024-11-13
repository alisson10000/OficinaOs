<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrdemServicoController;

Route::get('/w', function () {
    return view('welcome');
});


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/ordem-servico/create', [OrdemServicoController::class, 'create'])->name('ordem-servico.create');
Route::post('/ordem-servico', [OrdemServicoController::class, 'store'])->name('ordem-servico.store');



Route::get('/ordens-servico', [OrdemServicoController::class, 'index'])->name('ordem-servico.index');
Route::get('/ordens-servico/create', [OrdemServicoController::class, 'create'])->name('ordem-servico.create');
Route::post('/ordens-servico', [OrdemServicoController::class, 'store'])->name('ordem-servico.store');
Route::get('/ordens-servico/{id}', [OrdemServicoController::class, 'show'])->name('ordem-servico.show');
Route::get('/ordens-servico/{id}/edit', [OrdemServicoController::class, 'edit'])->name('ordem-servico.edit');
Route::put('/ordens-servico/{id}', [OrdemServicoController::class, 'update'])->name('ordem-servico.update');
Route::delete('/ordens-servico/{id}', [OrdemServicoController::class, 'destroy'])->name('ordem-servico.destroy');
Route::get('/ordens-servico/{id}', [OrdemServicoController::class, 'show'])->name('ordem-servico.show');

Route::get('/ordens-servico/{id}/edit', [OrdemServicoController::class, 'edit'])->name('ordem-servico.edit');
Route::put('/ordens-servico/{id}', [OrdemServicoController::class, 'update'])->name('ordem-servico.update');


