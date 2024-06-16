<!DOCTYPE html>
<html>
<head>
    <title>Mapa com Rotas</title>
    <link rel="stylesheet" href="/css/maps.css">
</head>
<body>
    <!-- Div lateral para opções de rotas -->
    <div class="lateral" id="lateral">
        <div class="user-profile">
            <!-- Botão de Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
            <!-- Nome do Usuário -->
            @if($userName)
            <div>
                <p>Bem-vindo, {{ $userName }}</p>
            </div>
            @endif
            <!-- Círculo com a Imagem de Perfil do Usuário -->
            <div class="profile-circle">
                <!-- Substitua 'user.jpg' pelo caminho da imagem do perfil -->
            </div>
        </div>
        <nav>
            <ul>
                @foreach ($routes as $route)
                    <li><a href="#" class="rotas" onclick="calcularRota({{ json_encode($route->coordinates) }})">{{ $route->name }}</a></li>
                @endforeach
            </ul>
        </nav>

        <!-- Botão de abrir/fechar -->
        <button class="toggle-button" onclick="toggleLateral()">Menu</button>
    </div>

    <!-- Mapa do Google -->
    <div id="map"></div>

    <!-- JavaScript externo -->
    <script src="/js/maps/script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('superUserButton').addEventListener('click', function() {
                window.location.href = "{{ route('routes.index') }}";
            });

            // Definir os dados dos motoristas disponíveis para o JavaScript
            var motoristasData = {!! $motoristas->toJson() !!};

            // Chamar função para inicializar o mapa e adicionar marcadores dos motoristas
            initMap();
        });
    </script>

    <!-- Carrega a API do Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
</body>
</html>
