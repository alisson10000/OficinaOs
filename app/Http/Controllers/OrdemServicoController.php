<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdemServico;

class OrdemServicoController extends Controller
{





    // Método para exibir o formulário de criação
    public function create()
    {
        return view('ordem-servico.create');
    }

    // Método para salvar a nova ordem de serviço no banco
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'cliente' => 'required|string|max:255',
            'veiculo' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'data_criacao' => 'required|date',
            'descricao' => 'nullable|string', // Validação para o campo descrição
        ]);


        // Criação da ordem de serviço
        OrdemServico::create([
            'cliente' => $request->cliente,
            'veiculo' => $request->veiculo,
            'status' => $request->status,
            'data_criacao' => $request->data_criacao,
            'descricao' => $request->descricao, // Adiciona o campo descrição
        ]);


        // Redirecionar para a dashboard ou uma página de confirmação
        return redirect()->route('dashboard')->with('success', 'Ordem de Serviço criada com sucesso!');
    }


    public function show($id)
    {
        // Busca a ordem de serviço pelo ID
        $ordem = OrdemServico::findOrFail($id);

        // Retorna a view com os dados da ordem de serviço
        return view('ordem-servico.show', compact('ordem'));
    }





    public function edit($id)
    {
        // Busca a ordem de serviço pelo ID
        $ordem = OrdemServico::findOrFail($id);

        // Retorna a view com os dados da ordem de serviço para edição
        return view('ordem-servico.edit', compact('ordem'));
    }

    public function update(Request $request, $id)
    {
        // Valida os dados recebidos
        $request->validate([
            'cliente' => 'required|string|max:255',
            'veiculo' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'data_criacao' => 'required|date',
            'descricao' => 'nullable|string',
        ]);

        // Busca a ordem de serviço e atualiza os dados
        $ordem = OrdemServico::findOrFail($id);
        $ordem->update([
            'cliente' => $request->cliente,
            'veiculo' => $request->veiculo,
            'status' => $request->status,
            'data_criacao' => $request->data_criacao,
            'descricao' => $request->descricao,
        ]);

        // Redireciona para a lista com uma mensagem de sucesso
        return redirect()->route('dashboard')->with('success', 'Ordem de serviço atualizada com sucesso.');
    }















    /**
     * Excluir uma ordem de serviço.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $ordem = OrdemServico::findOrFail($id);
        $ordem->delete();

        // Redireciona para a rota 'dashboard' com uma mensagem de sucesso
        return redirect()->route('dashboard')->with('success', 'Ordem de serviço excluída com sucesso.');
    }
}
