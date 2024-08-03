<!DOCTYPE html>
<html>
<head>
    <title>Lista de Rotas</title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=10, minimum-scale=1.0">

    <link rel="stylesheet" type="text/css" href="/css/edit.css">
</head>
<body>
    <button onclick="window.location.href='{{ route('maps') }}'">Voltar para o Mapa</button>
    <h1>Lista de Rotas</h1>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <div class="actions">
        <a href="{{ route('routes.create') }}" class="button">Cadastrar</a>
    </div>

    <ul>
        @foreach ($routes as $route)
            <li>
                {{ $route->name }}
                <div>
                    <button onclick="viewRoute({{ json_encode($route->coordinates) }})">Visualizar</button>
                    <a href="{{ route('routes.edit', $route->id) }}" class="button">Editar</a>
                    <form action="{{ route('routes.destroy', $route->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete">Excluir</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    <div class="map-container">
        <div id="map" style="display:none;"></div>
    </div>

    <script>
        var map;
        var directionsService;
        var directionsRenderer;

        function initMap() {
            // Cria o mapa
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: { lat: -22.915822982788086, lng: -42.819297790527344 }
            });

            // Inicializa os serviços de direção
            directionsService = new google.maps.DirectionsService();
            directionsRenderer = new google.maps.DirectionsRenderer({
                map: map,
                suppressMarkers: true // Remover marcadores
            });
        }

        function viewRoute(coordinates) {
            var pontos = coordinates.map(function(coord) {
                return {
                    lat: parseFloat(coord.lat),
                    lng: parseFloat(coord.lng)
                };
            });

            var waypoints = pontos.map(function(ponto) {
                return {
                    location: ponto,
                    stopover: true
                };
            });

            var request = {
                origin: pontos[0],
                destination: pontos[pontos.length - 1],
                waypoints: waypoints,
                travelMode: google.maps.TravelMode.DRIVING
            };

            // Faz a solicitação da rota
            directionsService.route(request, function(result, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    // Renderiza a rota no mapa
                    directionsRenderer.setDirections(result);
                    document.getElementById('map').style.display = 'block';
                } else {
                    console.error('Erro ao calcular rota:', status);
                }
            });
        }

        // Inicializa o mapa ao carregar a página
        window.onload = function() {
            initMap();
        }
    </script>

    <!-- Carrega a API do Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
</body>
</html>
