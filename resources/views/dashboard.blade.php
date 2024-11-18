<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Cabeçalho responsivo -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Oficina</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard') }}">Início</a>
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
                <div class="d-flex align-items-center">
                    <span class="text-white me-3">Bem-vindo, {{ Auth::user()->name ?? 'Usuário' }}!</span>
                    <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Conteúdo principal -->
    <div class="container-fluid mt-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-3">
            <h2 class="h4">Ordens de Serviço</h2>
            <a href="{{ route('ordem-servico.create') }}" class="btn btn-primary mt-3 mt-md-0">Nova Ordem de Serviço</a>
        </div>

        <!-- Formulário de busca -->
        <form action="{{ route('ordem-servico.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar pelo nome do cliente" value="{{ request('search') }}">
                <button class="btn btn-secondary" type="submit">Buscar</button>
            </div>
        </form>

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
                        <th>Nº da OS</th>
                        <th>Cliente</th>
                        <th>Veículo</th>
                        <th>Status</th>
                        <th>Entrada</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ordensServico as $ordem)
                    <tr>
                        <td>{{ $ordem->id }}</td>
                        <td>{{ $ordem->cliente }}</td>
                        <td>{{ $ordem->veiculo }}</td>
                        <td>
                            <span class="badge 
                                @if($ordem->status == 'Concluído') bg-success
                                @elseif($ordem->status == 'Em Andamento') bg-warning
                                @else bg-secondary @endif">
                                {{ $ordem->status }}
                            </span>
                        </td>
                        <td>{{ $ordem->data_criacao }}</td>
                        <td>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <a href="{{ route('ordem-servico.show', $ordem->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('ordem-servico.edit', $ordem->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('ordem-servico.destroy', $ordem->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta ordem de serviço?')">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Nenhuma ordem de serviço encontrada.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4">
            <p class="mb-0 text-muted">
                Mostrando {{ $ordensServico->firstItem() }} a {{ $ordensServico->lastItem() }} de {{ $ordensServico->total() }} registros
            </p>
            <nav>
                <ul class="pagination pagination-sm">
                    @if ($ordensServico->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">&laquo; Anterior</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $ordensServico->previousPageUrl() }}">&laquo; Anterior</a>
                        </li>
                    @endif
                    @foreach ($ordensServico->getUrlRange(1, $ordensServico->lastPage()) as $page => $url)
                        <li class="page-item {{ $ordensServico->currentPage() === $page ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                    @if ($ordensServico->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $ordensServico->nextPageUrl() }}">Próxima &raquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">Próxima &raquo;</span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
