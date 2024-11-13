<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Ordem de Serviço</title>
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

    <!-- Formulário de Cadastro de Ordem de Serviço -->
    <div class="container mt-5">
        <h1>Nova Ordem de Serviço</h1>
        
        <!-- Exibe mensagens de erro -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ordem-servico.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="cliente" class="form-label">Cliente</label>
                <input type="text" name="cliente" class="form-control" id="cliente" value="{{ old('cliente') }}" required>
            </div>

            <div class="mb-3">
                <label for="veiculo" class="form-label">Veículo</label>
                <input type="text" name="veiculo" class="form-control" id="veiculo" value="{{ old('veiculo') }}" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-select" id="status" required>
                    <option value="Pendente" {{ old('status') == 'Pendente' ? 'selected' : '' }}>Pendente</option>
                    <option value="Em Andamento" {{ old('status') == 'Em Andamento' ? 'selected' : '' }}>Em Andamento</option>
                    <option value="Concluído" {{ old('status') == 'Concluído' ? 'selected' : '' }}>Concluído</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="data_criacao" class="form-label">Data de Criação</label>
                <input type="date" name="data_criacao" class="form-control" id="data_criacao" value="{{ old('data_criacao') }}" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição do Serviço</label>
                <textarea name="descricao" class="form-control" id="descricao" rows="4">{{ old('descricao') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
