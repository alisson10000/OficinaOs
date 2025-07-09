@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Editar Cliente</h2>

    {{-- Exibição de erros de validação --}}
    @if ($errors->any())
        <div style="color: red; margin-bottom: 1rem;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulário de edição --}}
    <form action="{{ route('clientes.atualizar', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome', $cliente->nome) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $cliente->email) }}">
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone" value="{{ old('telefone', $cliente->telefone) }}">
        </div>

        <div class="form-group">
            <label for="cpf_cnpj">CPF/CNPJ</label>
            <input type="text" name="cpf_cnpj" id="cpf_cnpj" value="{{ old('cpf_cnpj', $cliente->cpf_cnpj) }}">
        </div>

        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco" value="{{ old('endereco', $cliente->endereco) }}">
        </div>

        <div class="form-group">
            <label for="observacoes">Observações</label>
            <textarea name="observacoes" id="observacoes" rows="3">{{ old('observacoes', $cliente->observacoes) }}</textarea>
        </div>

        <button type="submit">Atualizar Cliente</button>
    </form>
</div>
@endsection
