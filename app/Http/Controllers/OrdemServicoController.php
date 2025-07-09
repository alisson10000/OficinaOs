<?php

namespace App\Http\Controllers;

use App\Models\OrdemServico;
use App\Models\Cliente;
use Illuminate\Http\Request;

class OrdemServicoController extends Controller
{
    /**
     * 🧾 Lista ordens de serviço com busca por nome do cliente.
     */
    public function listar(Request $request)
    {
        $busca = $request->input('busca');

        $ordens = OrdemServico::with('cliente')
            ->when($busca, function ($query, $busca) {
                $query->whereHas('cliente', function ($q) use ($busca) {
                    $q->where('nome', 'like', "%{$busca}%");
                });
            })
            ->orderBy('data_entrada', 'desc')
            ->get();

        return view('ordens.listar', compact('ordens', 'busca'));
    }

    /**
     * ➕ Formulário de criação de OS.
     */
    public function criar()
    {
        $clientes = Cliente::orderBy('nome')->get();
        return view('ordens.criar', compact('clientes'));
    }

    /**
     * 💾 Armazena nova OS.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'data_entrada' => 'required|date',
            'descricao_servico' => 'required|string',
            'status' => 'nullable|string',
            'data_saida' => 'nullable|date|after_or_equal:data_entrada',
            'valor_total' => 'nullable|numeric',
            'observacoes' => 'nullable|string',
        ]);

        OrdemServico::create($request->all());

        return redirect()->route('ordens.listar')->with('success', '✅ Ordem de serviço criada com sucesso!');
    }

    /**
     * ✏️ Formulário de edição de OS.
     */
    public function editar($id)
    {
        $ordem = OrdemServico::findOrFail($id);
        $clientes = Cliente::orderBy('nome')->get();

        return view('ordens.editar_form', compact('ordem', 'clientes'));
    }

    /**
     * 🔁 Atualiza OS.
     */
    public function atualizar(Request $request, $id)
    {
        $ordem = OrdemServico::findOrFail($id);

        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'data_entrada' => 'required|date',
            'descricao_servico' => 'required|string',
            'status' => 'nullable|string',
            'data_saida' => 'nullable|date|after_or_equal:data_entrada',
            'valor_total' => 'nullable|numeric',
            'observacoes' => 'nullable|string',
        ]);

        $ordem->update($request->all());

        return redirect()->route('ordens.listar')->with('success', '✏️ Ordem de serviço atualizada com sucesso!');
    }

    /**
     * ❌ Exclui OS.
     */
    public function deletar($id)
    {
        $ordem = OrdemServico::findOrFail($id);
        $ordem->delete();

        return redirect()->route('ordens.listar')->with('success', '🗑️ Ordem de serviço excluída com sucesso!');
    }
    public function show($id)
    {
        $ordem = OrdemServico::with('cliente')->findOrFail($id);
        return view('ordens.show', compact('ordem'));
    }
}
