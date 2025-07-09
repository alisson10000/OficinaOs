@extends('layouts.app')

@section('content')
<div class="container">
    <h2>👁️ Detalhes do Cliente</h2>

    <div style="margin-top: 1rem;">
        <p><strong>Nome:</strong> {{ $cliente->nome }}</p>
        <p><strong>Email:</strong> {{ $cliente->email }}</p>
        <p><strong>Telefone:</strong> {{ $cliente->telefone }}</p>
        <p><strong>CPF/CNPJ:</strong> {{ $cliente->cpf_cnpj }}</p>
        <p><strong>Endereço:</strong> {{ $cliente->endereco }}</p>
        <p><strong>Observações:</strong> {{ $cliente->observacoes }}</p>
    </div>

    <a href="{{ route('clientes.listar') }}"
       style="margin-top: 1rem; display: inline-block;
              background-color: #004080; color: white;
              padding: 0.5rem 1rem; border-radius: 6px;
              text-decoration: none;">
        ⬅️ Voltar à Lista
    </a>
</div>
@endsection
