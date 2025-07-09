<nav class="menu-nav">
    <div class="menu-left">

        {{-- 📋 Clientes --}}
        <div class="dropdown">
            <button class="dropbtn">📋 Clientes</button>
            <div class="dropdown-content">
                <a href="{{ route('clientes.listar') }}">Listar</a>
                <a href="{{ route('clientes.criar') }}">Criar</a>
            </div>
        </div>

        {{-- 🛠️ Ordens de Serviço --}}
        <div class="dropdown">
            <button class="dropbtn">🛠️ Ordens de Serviço</button>
            <div class="dropdown-content">
                <a href="{{ route('ordens.listar') }}">Listar</a>
                <a href="{{ route('ordens.criar') }}">Criar</a>
            </div>
        </div>

        {{-- 🏠 Dashboard --}}
        <a style="color: white" href="{{ route('dashboard') }}">🏠 Dashboard</a>
    </div>

    {{-- 🚪 Logout --}}
    <div class="menu-right">
        <form method="POST" action="/logout">
            @csrf
            <button type="submit">🚪 Sair</button>
        </form>
    </div>
</nav>
