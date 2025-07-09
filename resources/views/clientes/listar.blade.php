@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>📋 Lista de Clientes</h2>

        {{-- Mensagem de sucesso --}}
        @if (session('success'))
            <div style="color: green; margin-bottom: 1rem;">
                {{ session('success') }}
            </div>
        @endif

        {{-- Formulário de busca --}}
        <form method="GET" action="{{ route('clientes.listar') }}"
            style="margin-bottom: 1rem; display: flex; gap: 10px; align-items: center;">
            <input type="text" name="busca" placeholder="Buscar por nome..." value="{{ $busca ?? '' }}"
                style="padding: 0.5rem 0.75rem; width: 250px;
                          background-color: white; color: #004080;
                          border: 2px solid #004080; border-radius: 6px; font-size: 14px;">

            <button type="submit"
                style="padding: 0.5rem 1rem; background-color: #004080;
                           color: white; border: none; border-radius: 6px;
                           cursor: pointer; display: flex; align-items: center;">
                🔍 Buscar
            </button>
        </form>

        {{-- Botão para novo cliente --}}
        <a href="{{ route('clientes.criar') }}"
            style="background-color: #004080; color: white;
                  padding: 0.5rem 1rem; border-radius: 6px;
                  text-decoration: none; display: inline-block; margin-bottom: 1rem;">
            + Novo Cliente
        </a>

        {{-- Tabela de resultados --}}
        <table border="1" cellpadding="10" cellspacing="0"
            style="width: 100%; margin-top: 1rem; background-color: white; border-collapse: collapse;">
            <thead style="background-color: #004080; color: white;">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->telefone }}</td>
                        <td style="display: flex; gap: 10px; align-items: center;">
                            {{-- Botão Ver --}}
                            <a href="{{ route('clientes.show', $cliente->id) }}"
                                style="background-color: #17a2b8; color: white;
              padding: 0.3rem 0.8rem; border-radius: 5px;
              text-decoration: none; font-weight: bold;">
                                👁️ Ver
                            </a>

                            {{-- Botão Editar --}}
                            <a href="{{ route('clientes.editar.form', $cliente->id) }}"
                                style="background-color: #ffc107; color: black;
                                      padding: 0.3rem 0.8rem; border-radius: 5px;
                                      text-decoration: none; font-weight: bold;">
                                ✏️ Editar
                            </a>

                            {{-- Botão Excluir --}}
                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')"
                                    style="background-color: #c82333; color: white;
                                               border: none; padding: 0.3rem 0.8rem;
                                               border-radius: 5px; cursor: pointer; margin-top:25px">
                                    🗑️ Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align: center;">Nenhum cliente encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
