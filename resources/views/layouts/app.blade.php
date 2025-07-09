<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Sistema de OS </title>

    {{-- Inclui os estilos com Vite --}}
    @vite('resources/css/app.css')
</head>

<body>

    {{-- Topo --}}
    <x-topo />

    {{-- Menu --}}
    <x-menu />

    <div class="container" style="margin-top:-400px">
        @yield('content')
    </div>

</body>

</html>
