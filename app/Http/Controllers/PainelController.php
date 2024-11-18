<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;




class PainelController extends Controller
{
    public function index()
    {
        // Exemplo de dados simulados
        $notificacoes = [
            'ordensAtrasadas' => 5,
            'pendenciasFinanceiras' => 3,
        ];

        $acoesRapidas = [
            ['rota' => route('ordem-servico.create'), 'nome' => 'Criar Nova Ordem'],
            ['rota' => route('clientes.create'), 'nome' => 'Adicionar Cliente'],
        ];

        // Mensagem de boas-vindas personalizada
        $usuario = auth()->user()->name ?? 'Usuário';

        return view('painel', compact('notificacoes', 'acoesRapidas', 'usuario'));
    }
}
