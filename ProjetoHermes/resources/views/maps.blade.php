<!DOCTYPE html>
<html>
<head>
    <title>Mapa com Rotas</title>
    <style>
        /* Estilo para a div lateral */
        .lateral {
            position: absolute;
            top: 0;
            left: 0;
            width: 200px; /* largura da div */
            height: 100%; /* altura igual à tela */
            background-color: #f0f0f0; /* cor de fundo */
            padding: 20px; /* espaçamento interno */
        }

        /* Estilo para os itens de rota */
        .opcao {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .rotas {
            font-size: 16px;
            color: blue;
            text-decoration: none;
        }

        .rotas:hover {
            text-decoration: underline;
        }

        /* Estilo para o mapa */
        #map {
            position: absolute;
            top: 0;
            left: 200px; /* largura da div lateral */
            height: 100%;
            width: calc(100% - 200px); /* largura total menos a largura da div lateral */
        }
    </style>
</head>
<body>
    <!-- Div lateral para opções de rotas -->
    <div class="lateral">
        <nav>
            <ul>
                <li><h3 class="opcao"><strong>Rotas</strong></h3></li>
                <li><a href="#" class="rotas" onclick="calcularRotaCircular()">Rota Circular</a></li>
                <li><a href="#" class="rotas" onclick="calcularRotaRecantoInoa()">Recanto x Inoa</a></li>
            </ul>
        </nav>
    </div>

    <!-- Mapa do Google -->
    <div id="map"></div>
    
    <!-- Script para inicializar o mapa -->
    <script>
        var directionsService;
        var directionsRenderer;

        function initMap() {
            // Cria o mapa
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: { lat: -22.915822982788086, lng: -42.819297790527344 }
            });

            // Inicializa os serviços de direção
            directionsService = new google.maps.DirectionsService();
            directionsRenderer = new google.maps.DirectionsRenderer({
                map: map,
                suppressMarkers: true // Remover marcadores
            });

            // Mostrar localização atual
            mostrarLocalizacaoAtual(map);
        }

        function mostrarLocalizacaoAtual(map) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var posicao = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    var marcador = new google.maps.Marker({
                        position: posicao,
                        map: map,
                        title: 'Minha Localização'
                    });

                    map.setCenter(posicao);
                }, function() {
                    console.error('Erro: Não foi possível acessar a geolocalização.');
                });
            } else {
                console.error('Erro: O navegador não suporta geolocalização.');
            }
        }

        function calcularRotaCircular() {
            var pontos = [
                { lat: -22.9569198, lng: -42.9792601 },
                { lat: -22.9646489, lng: -42.9792649 },
                { lat: -22.9645698, lng: -42.9621202 },
                { lat: -22.9532288, lng: -42.9622704 },
                { lat: -22.9450484, lng: -42.9623134 },
                { lat: -22.950344, lng: -42.971862 },
                { lat: -22.956568, lng: -42.9788572 }
            ];

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
                } else {
                    console.error('Erro ao calcular rota:', status);
                }
            });
        }

        function calcularRotaRecantoInoa() {
            var pontos = [
                { lat: -22.9681156, lng: -43.010565 },
                { lat: -22.9582344, lng: -42.9798743 },
                { lat: -22.9646553, lng: -42.962087 },
                { lat: -22.9450758, lng: -42.9622927 },
                { lat: -22.9162965, lng: -42.9336746 },
                { lat: -22.9164884, lng: -42.9308195 }
            ];

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
                } else {
                    console.error('Erro ao calcular rota:', status);
                }
            });
        }
    </script>

    <!-- Carrega a API do Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
</body>
</html>

