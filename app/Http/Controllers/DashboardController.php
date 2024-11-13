<?php

namespace App\Http\Controllers;

use App\Models\OrdemServico; // Importe o model aqui
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Buscar todas as ordens de serviço do banco de dados
        $ordensServico = OrdemServico::all();

        // Passar as ordens de serviço para a view 'dashboard'
        return view('dashboard', compact('ordensServico'));
    }
}
