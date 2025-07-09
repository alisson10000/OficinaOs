@extends('layouts.app')

@section('content')
    <div class="cliente-lista" style="max-width: 1000px; margin: 0 auto;">
        <h2>Lista de Clientes</h2>

        @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        <a href="{{ route('clientes.create') }}" style="display: inline-block; margin-bottom: 15px;">
            + Novo Cliente
        </a>

        <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; background: white; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #004080; color: white;">
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
                        <td>
                            <a href="{{ route('clientes.show', $cliente) }}">Ver</a> |
                            <a href="{{ route('clientes.edit', $cliente) }}">Editar</a> |
                            <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Deseja realmente excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align: center;">Nenhum cliente cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
