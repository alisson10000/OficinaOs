@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Editar Ordem de Serviço</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 1rem;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ordens.atualizar', $ordem->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Cliente --}}
        <div class="form-group">
            <label for="cliente_id">Cliente</label>
            <select name="cliente_id" id="cliente_id" required>
                <option value="">Selecione um cliente</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ $cliente->id == $ordem->cliente_id ? 'selected' : '' }}>
                        {{ $cliente->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Data de Entrada --}}
        <div class="form-group">
            <label for="data_entrada">Data de Entrada</label>
            <input type="date" name="data_entrada" id="data_entrada" value="{{ $ordem->data_entrada }}" required>
        </div>

        {{-- Data de Saída --}}
        <div class="form-group">
            <label for="data_saida">Data de Saída</label>
            <input type="date" name="data_saida" id="data_saida" value="{{ $ordem->data_saida }}">
        </div>

        {{-- Status --}}
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" required>
                <option value="Em andamento" {{ $ordem->status == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
                <option value="Concluído" {{ $ordem->status == 'Concluído' ? 'selected' : '' }}>Concluído</option>
                <option value="Cancelado" {{ $ordem->status == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
            </select>
        </div>

        {{-- Descrição do Serviço --}}
        <div class="form-group">
            <label for="descricao_servico">Descrição do Serviço</label>
            <textarea name="descricao_servico" id="descricao_servico" rows="3" required>{{ $ordem->descricao_servico }}</textarea>
        </div>

        {{-- Valor Total --}}
        <div class="form-group">
            <label for="valor_total">Valor Total (R$)</label>
            <input type="number" name="valor_total" id="valor_total" step="0.01" value="{{ $ordem->valor_total }}">
        </div>

        {{-- Observações --}}
        <div class="form-group">
            <label for="observacoes">Observações</label>
            <textarea name="observacoes" id="observacoes" rows="3">{{ $ordem->observacoes }}</textarea>
        </div>

        <button type="submit">Atualizar Ordem</button>
    </form>
</div>
@endsection
