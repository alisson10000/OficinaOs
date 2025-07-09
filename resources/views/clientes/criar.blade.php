@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Novo Cliente</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 1rem;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone">
        </div>

        <div class="form-group">
            <label for="cpf_cnpj">CPF/CNPJ</label>
            <input type="text" name="cpf_cnpj" id="cpf_cnpj">
        </div>

        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco">
        </div>

        <div class="form-group">
            <label for="observacoes">Observações</label>
            <textarea name="observacoes" id="observacoes" rows="3"></textarea>
        </div>

        <button type="submit">Salvar Cliente</button>
    </form>
</div>
@endsection
