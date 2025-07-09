@extends('layouts.app')

@section('content')
<div class="ordem-container">
    <h2>👁️ Detalhes da Ordem de Serviço</h2>

    <div style="margin-top: 1rem;">
        <p><strong>Cliente:</strong> {{ $ordem->cliente->nome }}</p>
        <p><strong>Data de Entrada:</strong> {{ \Carbon\Carbon::parse($ordem->data_entrada)->format('d/m/Y') }}</p>
        <p><strong>Data de Saída:</strong> 
            {{ $ordem->data_saida ? \Carbon\Carbon::parse($ordem->data_saida)->format('d/m/Y') : 'Não informada' }}
        </p>
        <p><strong>Status:</strong> {{ $ordem->status }}</p>
        <p><strong>Descrição do Serviço:</strong> {{ $ordem->descricao_servico }}</p>
        <p><strong>Valor Total:</strong> R$ {{ number_format($ordem->valor_total, 2, ',', '.') }}</p>
        <p><strong>Observações:</strong> {{ $ordem->observacoes }}</p>
    </div>

    <a href="{{ route('ordens.listar') }}" class="voltar-btn">
        ⬅️ Voltar à Lista
    </a>
</div>
@endsection
