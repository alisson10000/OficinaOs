<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdemServico;

class DashboardController extends Controller
{
    public function index()
    {
        // Buscar as ordens de serviço com paginação (10 por página)
        $ordensServico = OrdemServico::paginate(10);

        // Retornar a view com as ordens paginadas
        return view('dashboard', compact('ordensServico'));
    }
}
