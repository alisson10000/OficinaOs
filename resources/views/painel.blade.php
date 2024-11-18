<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Geral</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Oficina - Painel Geral</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Bem-vindo, {{ $usuario }}!</h1>

        <!-- Notificações Importantes -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card border-danger">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Ordens Atrasadas</h5>
                        <p class="card-text">{{ $notificacoes['ordensAtrasadas'] }} ordens estão atrasadas.</p>
                        <a href="{{ route('ordem-servico.index') }}" class="btn btn-danger">Ver Detalhes</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-warning">
                    <div class="card-body">
                        <h5 class="card-title text-warning">Pendências Financeiras</h5>
                        <p class="card-text">{{ $notificacoes['pendenciasFinanceiras'] }} pendências financeiras.</p>
                        <a href="#" class="btn btn-warning">Ver Detalhes</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ações Rápidas -->
        <div class="row">
            <h3 class="mb-3">Ações Rápidas</h3>
            @foreach ($acoesRapidas as $acao)
                <div class="col-md-4 mb-3">
                    <a href="{{ $acao['rota'] }}" class="btn btn-primary w-100">{{ $acao['nome'] }}</a>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
