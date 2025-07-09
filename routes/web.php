<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\OrdemServicoController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); // 👈 NOMEANDO A ROTA





Route::post('/logout', function (Request $request) {
    Auth::logout();                             // Encerra a autenticação
    $request->session()->invalidate();          // Invalida a sessão
    $request->session()->regenerateToken();     // Gera novo token CSRF

    return redirect('/'); // ou ->route('login') se tiver nomeado
})->middleware('auth');


// Clientes
Route::get('/clientes', [ClienteController::class, 'listar'])->name('clientes.listar');
Route::get('/clientes/criar', [ClienteController::class, 'criar'])->name('clientes.criar');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');

Route::get('/clientes/editar', [ClienteController::class, 'buscarEditar'])->name('clientes.editar');
Route::get('/clientes/editar/{id}', [ClienteController::class, 'formEditar'])->name('clientes.editar.form'); // ✅ agora GET
Route::put('/clientes/editar/{id}', [ClienteController::class, 'atualizar'])->name('clientes.atualizar');

Route::get('/clientes/excluir', [ClienteController::class, 'buscarExcluir'])->name('clientes.excluir');
Route::delete('/clientes/excluir/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
Route::get('/clientes/{id}', [ClienteController::class, 'show'])->name('clientes.show');


//ordens de serviço


Route::get('/ordens/listar', [OrdemServicoController::class, 'listar'])->name('ordens.listar');
Route::get('/ordens/criar', [OrdemServicoController::class, 'criar'])->name('ordens.criar');
Route::post('/ordens', [OrdemServicoController::class, 'store'])->name('ordens.store');
Route::get('/ordens/editar/{id}', [OrdemServicoController::class, 'editar'])->name('ordens.editar');
Route::put('/ordens/editar/{id}', [OrdemServicoController::class, 'atualizar'])->name('ordens.atualizar');
Route::delete('/ordens/deletar/{id}', [OrdemServicoController::class, 'deletar'])->name('ordens.deletar');
Route::get('/ordens/{id}', [OrdemServicoController::class, 'show'])->name('ordens.show');


