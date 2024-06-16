<!-- resources/views/routes/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Rotas</title>
    <style>
        /* Estilos CSS podem ser adicionados aqui */
    </style>
</head>
<body>
    <h1>Lista de Rotas</h1>

    <ul>
        @foreach ($routes as $route)
            <li>
                <a href="{{ route('routes.showRoute', $route->id) }}">{{ $route->name }}</a>
                <!-- Link para visualizar detalhes da rota -->
            </li>
        @endforeach
    </ul>
</body>
</html>
