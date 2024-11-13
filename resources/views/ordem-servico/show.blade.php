<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Ordem de Serviço</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Cabeçalho responsivo -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Oficina</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard') }}">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ordem-servico.index') }}">Ordens de Serviço</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Configurações</a>
                    </li>
                </ul>
                <div>
                    <a href="#" class="btn btn-outline-light btn-sm">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Conteúdo da página -->
    <div class="container mt-5">
        <h1>Ordem de Serviço #{{ $ordem->id }}</h1>
        
        <div class="card mt-4">
            <div class="card-header">
                <h5>Detalhes da Ordem de Serviço</h5>
            </div>
            <div class="card-body">
                <p><strong>Cliente:</strong> {{ $ordem->cliente }}</p>
                <p><strong>Veículo:</strong> {{ $ordem->veiculo }}</p>
                <p><strong>Status:</strong> {{ $ordem->status }}</p>
                <p><strong>Data de Criação:</strong> {{ $ordem->data_criacao }}</p>
                <p><strong>Descrição do Serviço:</strong> {{ $ordem->descricao }}</p>
            </div>
        </div>

        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>

    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
