<!DOCTYPE html>
<html>
<head>
    <title>Lista de Rotas</title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=10, minimum-scale=1.0">

    <style>
        /* Estilos CSS podem ser adicionados aqui */
        .map-container {
            display: none; /* Inicialmente oculto */
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Lista de Rotas</h1>
    
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <ul>
        @foreach ($routes as $route)
            <li>
                {{ $route->name }}
                <a href="{{ route('routes.edit', $route->id) }}">Editar</a>
                <button onclick="visualizeRoute({{ json_encode($route->coordinates) }})">Visualizar</button>
            </li>
        @endforeach
    </ul>

    <!-- Div para mostrar o preview do mapa -->
    <div id="map" class="map-container"></div>

    <!-- Script para inicializar o mapa -->
    <script>
        var map;
        var directionsService;
        var directionsRenderer;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: { lat: -22.915822982788086, lng: -42.819297790527344 } // Ponto central inicial
            });

            directionsService = new google.maps.DirectionsService();
            directionsRenderer = new google.maps.DirectionsRenderer({
                map: map,
                suppressMarkers: true // Remover marcadores
            });
        }

        function visualizeRoute(coordinates) {
            var points = coordinates.map(coord => ({ lat: parseFloat(coord.lat), lng: parseFloat(coord.lng) }));
            var waypoints = points.map(point => ({ location: point, stopover: true }));

            var request = {
                origin: points[0],
                destination: points[points.length - 1],
                waypoints: waypoints,
                travelMode: google.maps.TravelMode.DRIVING
            };

            directionsService.route(request, function(result, status) {
                if (status === google.maps.DirectionsStatus.OK) {
                    directionsRenderer.setDirections(result);
                    document.getElementById('map').style.display = 'block';
                } else {
                    console.error('Erro ao calcular rota:', status);
                }
            });
        }

        // Inicializar o mapa quando a página carregar
        window.onload = initMap;
    </script>

    <!-- Carrega a API do Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
</body>
</html>
