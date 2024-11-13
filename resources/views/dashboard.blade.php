<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oficina - Dashboard</title>
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
                        <a class="nav-link active" href="#">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ordens de Serviço</a>
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

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h4">Ordens de Serviço</h2>
            <a href="{{ route('ordem-servico.create') }}" class="btn btn-primary">Nova Ordem de Serviço</a>
        </div>

        <!-- Alerta de sucesso -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Tabela de ordens de serviço -->
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Número da OS</th>
                        <th>Cliente</th>
                        <th>Veículo</th>
                        <th>Status</th>
                        <th>Data de Criação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ordensServico as $ordem)
                    <tr>
                        <td>{{ $ordem->id }}</td>
                        <td>{{ $ordem->cliente }}</td>
                        <td>{{ $ordem->veiculo }}</td>
                        <td>{{ $ordem->status }}</td>
                        <td>{{ $ordem->data_criacao }}</td>
                        <td>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <!-- Botão para ver detalhes -->
                                <a href="{{ route('ordem-servico.show', $ordem->id) }}" class="btn btn-info btn-sm mb-1 mb-md-0">Ver</a>

                                <!-- Botão para editar -->
                                <a href="{{ route('ordem-servico.edit', $ordem->id) }}" class="btn btn-warning btn-sm mb-1 mb-md-0">Editar</a>

                                <!-- Formulário para exclusão -->
                                <form action="{{ route('ordem-servico.destroy', $ordem->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta ordem de serviço?')">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
