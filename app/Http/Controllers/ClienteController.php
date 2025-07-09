<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * 🧾 Listar clientes com busca opcional
     */
    public function listar(Request $request)
    {
        $busca = $request->input('busca');

        $clientes = Cliente::when($busca, function ($query, $busca) {
            return $query->where('nome', 'like', "%{$busca}%")
                ->orWhere('email', 'like', "%{$busca}%");
        })->orderBy('nome')->get();

        return view('clientes.listar', compact('clientes', 'busca'));
    }

    /**
     * ➕ Formulário de criação
     */
    public function criar()
    {
        return view('clientes.criar');
    }

    /**
     * 💾 Armazenar novo cliente
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome'       => 'required|string|max:255',
            'email'      => 'nullable|email|max:255',
            'telefone'   => 'nullable|string|max:20',
            'cpf_cnpj'   => 'nullable|string|max:20',
            'endereco'   => 'nullable|string|max:255',
            'observacoes' => 'nullable|string',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.listar')->with('success', '✅ Cliente cadastrado com sucesso!');
    }

    /**
     * 📝 Página inicial para busca e edição
     */
    public function buscarEditar()
    {
        return view('clientes.editar_busca');
    }

    /**
     * 📝 Formulário para editar cliente
     */
    public function formEditar($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.editar_form', compact('cliente'));
    }

    /**
     * 🔁 Atualizar cliente
     */
    public function atualizar(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $request->validate([
            'nome'       => 'required|string|max:255',
            'email'      => 'nullable|email|max:255',
            'telefone'   => 'nullable|string|max:20',
            'cpf_cnpj'   => 'nullable|string|max:20',
            'endereco'   => 'nullable|string|max:255',
            'observacoes' => 'nullable|string',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.listar')->with('success', '✏️ Cliente atualizado com sucesso!');
    }

    /**
     * ❌ Página inicial para busca e exclusão
     */
    public function buscarExcluir()
    {
        return view('clientes.deletar');
    }

    /**
     * ❌ Excluir cliente
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.listar')->with('success', '🗑️ Cliente excluído com sucesso!');
    }
    /**
     * 👁️ Exibir detalhes de um cliente
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }
}
