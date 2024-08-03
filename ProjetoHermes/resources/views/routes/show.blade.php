<!-- resources/views/routes/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=10, minimum-scale=1.0">

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
