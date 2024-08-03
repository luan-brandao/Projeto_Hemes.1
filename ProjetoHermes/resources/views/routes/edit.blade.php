<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=10, minimum-scale=1.0">

    <title>Editar Rota</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 20px;
            padding: 20px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }

        label {
            font-weight: bold;
        }

        input[type="file"] {
            margin-bottom: 10px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        .error-messages {
            background-color: #ffe6e6;
            color: #dc3545;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .error-messages ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .error-messages li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <h1>Editar Rota: {{ $route->name }}</h1>
    
    @if ($errors->any())
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="updateRouteForm" action="{{ route('routes.update', $route->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="coordinates_file">Arquivo JSON de Coordenadas:</label><br>
            <input type="file" id="coordinates_file" name="coordinates_file"><br><br>
        </div>
        <button type="submit">Atualizar Rota</button>
    </form>

    <a href="{{ route('routes.index') }}">Voltar para a Lista de Rotas</a>

    <!-- JavaScript para redirecionar após a atualização -->
    <script>
        document.getElementById('updateRouteForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita o envio padrão do formulário

            // Submissão via AJAX ou outro método conforme necessário
            fetch(this.action, {
                method: this.method,
                body: new FormData(this)
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = "{{ route('routes.index') }}";
                } else {
                    throw new Error('Erro ao atualizar rota');
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                // Tratar o erro ou informar ao usuário
            });
        });
    </script>
</body>
</html>
