<!DOCTYPE html>
<html>
<head>
    <title>Perfil do Usuário</title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=10, minimum-scale=1.0">

    <link rel="stylesheet" href="/css/perfil.css">
</head>
<body>
    <div class="container">
        <button onclick="window.location.href='{{ route('maps') }}'">Voltar para o Mapa</button>
        <header>
            <h1>Perfil do Usuário</h1>
            @if(isset($userName))
            <p>Bem-vindo, {{ $userName }}</p>
            @endif
        </header>
        
        <section class="perfil-info">
            <div class="info-item">
                <strong>Nome:</strong> {{ auth()->user()->name }}
            </div>

            <div class="info-item">
                <strong>Email:</strong> {{ auth()->user()->email }}
            </div>

            @if(auth()->user()->driver)
            <!-- Exibe informações adicionais se o usuário for motorista -->
            <div class="info-item">
                <strong>Tipo de Usuário:</strong> Motorista
            </div>

            <!-- Informações adicionais específicas para motorista -->
            <div class="info-item">
                <strong>Carteira de Motorista:</strong> {{ auth()->user()->driver_license }}
            </div>
            <div class="info-item">
                <strong>Veículo:</strong> {{ auth()->user()->vehicle }}
            </div>
            @else
            <div class="info-item">
                <strong>Tipo de Usuário:</strong> Passageiro
            </div>
            @endif

            <!-- Botão para editar perfil -->
            <div class="editar-perfil">
                <a href="{{ route('perfil.edit') }}" class="button">Editar Perfil</a>
            </div>
        </section>
    </div>
</body>
</html>
