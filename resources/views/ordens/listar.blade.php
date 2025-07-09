@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>📋 Lista de Ordens de Serviço</h2>

        {{-- Mensagem de sucesso --}}
        @if (session('success'))
            <div style="color: green; margin-bottom: 1rem;">
                {{ session('success') }}
            </div>
        @endif

        {{-- Formulário de busca --}}
        <form method="GET" action="{{ route('ordens.listar') }}"
              style="margin-bottom: 1rem; display: flex; gap: 10px; align-items: center;">
            <input type="text" name="busca" placeholder="Buscar por cliente..." value="{{ $busca ?? '' }}"
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

        {{-- Botão para nova OS --}}
        <a href="{{ route('ordens.criar') }}"
           style="background-color: #004080; color: white;
                  padding: 0.5rem 1rem; border-radius: 6px;
                  text-decoration: none; display: inline-block; margin-bottom: 1rem;">
            + Nova Ordem de Serviço
        </a>

        {{-- Tabela de resultados --}}
        <table border="1" cellpadding="10" cellspacing="0"
               style="width: 100%; margin-top: 1rem; background-color: white; border-collapse: collapse;">
            <thead style="background-color: #004080; color: white;">
                <tr>
                    <th>Cliente</th>
                    <th>Data Entrada</th>
                    <th>Data Saída</th>
                    <th>Status</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ordens as $ordem)
                    <tr>
                        <td>{{ $ordem->cliente->nome }}</td>
                        <td>{{ \Carbon\Carbon::parse($ordem->data_entrada)->format('d/m/Y') }}</td>
                        <td>{{ $ordem->data_saida ? \Carbon\Carbon::parse($ordem->data_saida)->format('d/m/Y') : '-' }}</td>
                        <td>{{ $ordem->status }}</td>
                        <td>R$ {{ number_format($ordem->valor_total, 2, ',', '.') }}</td>
                        <td style="display: flex; gap: 10px; align-items: center;">
                            {{-- Botão Ver --}}
                            <a href="{{ route('ordens.show', $ordem->id) }}"
                               style="background-color: #17a2b8; color: white;
                                      padding: 0.3rem 0.8rem; border-radius: 5px;
                                      text-decoration: none; font-weight: bold;">
                                👁️ Ver
                            </a>

                            {{-- Botão Editar --}}
                            <a href="{{ route('ordens.editar', $ordem->id) }}"
                               style="background-color: #ffc107; color: black;
                                      padding: 0.3rem 0.8rem; border-radius: 5px;
                                      text-decoration: none; font-weight: bold;">
                                ✏️ Editar
                            </a>

                            {{-- Botão Excluir --}}
                            <form action="{{ route('ordens.deletar', $ordem->id) }}" method="POST"
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esta OS?')"
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
                        <td colspan="6" style="text-align: center;">Nenhuma ordem de serviço encontrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
