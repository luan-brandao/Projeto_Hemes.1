<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=10, minimum-scale=1.0">

    <title>Editar Perfil</title>
    <style>
        /* Estilos para a página de perfil e edição */

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Altura total da viewport */
        }

        .container {
            width: 80%; /* Largura ajustável conforme necessário */
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px; /* Espaçamento do topo para centralizar na tela */
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        header h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 10px;
        }

        .perfil-info {
            border-top: 2px solid #007bff;
            padding-top: 20px;
        }

        .info-item {
            margin-bottom: 15px;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }

        .info-item strong {
            font-weight: bold;
            color: #007bff;
            margin-right: 10px;
        }

        .editar-perfil {
            text-align: center;
            margin-top: 20px;
        }

        .editar-perfil .button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .editar-perfil .button:hover {
            background-color: #0056b3;
        }

        .perfil-edit-form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-actions {
            margin-top: 20px;
            text-align: center;
        }

        .form-actions .button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .form-actions .button:hover {
            background-color: #0056b3;
        }

        .form-actions .button-secondary {
            background-color: #ccc;
        }

        .form-actions .button-secondary:hover {
            background-color: #999;
        }

        /* Estilos para o botão de voltar */
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            background-color: #28a745; /* Verde */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            z-index: 9999;
        }

        .back-button:hover {
            background-color: #218838; /* Verde escuro */
        }

    </style>
</head>
<body>
    <button class="back-button" onclick="window.location.href='{{ route('maps') }}'">Voltar para o Mapa</button>

    <div class="container">
        <header>
            <h1>Editar Perfil</h1>
        </header>
        
        <section class="perfil-edit-form">
            <form method="POST" action="{{ route('perfil.update') }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" required>
                </div>

                @if(auth()->user()->driver)
                <!-- Campos adicionais para motorista -->
                <div class="form-group">
                    <label for="driver_license">Carteira de Motorista:</label>
                    <input type="text" id="driver_license" name="driver_license" value="{{ auth()->user()->driver_license }}">
                </div>

                <div class="form-group">
                    <label for="vehicle">Veículo:</label>
                    <input type="text" id="vehicle" name="vehicle" value="{{ auth()->user()->vehicle }}">
                </div>
                @endif

                <!-- Botões de Ação -->
                <div class="form-actions">
                    <button type="submit" class="button">Salvar</button>
                    <a href="{{ route('perfil') }}" class="button button-secondary">Cancelar</a>
                </div>
            </form>
        </section>
    </div>
</body>
</html>
