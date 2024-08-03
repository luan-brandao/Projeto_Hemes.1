<!DOCTYPE html>
<html>
<head>
    <title>Mapa do Driver</title>
    <style>
        #map {
            height: 100vh;
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="map"></div>

    <script>
        var map;
        var marcadorAtual;
        var atualizarIntervalo;
        var primeiraAtualizacao = true;

        function initMap() {
            // Pergunta ao usuário se ele quer mostrar sua localização
            if (confirm("Você quer mostrar sua localização no mapa?")) {
                // Cria o mapa
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 14,
                    center: { lat: -22.915822982788086, lng: -42.819297790527344 }
                });

                // Mostrar localização atual e configurar intervalo de atualização
                mostrarLocalizacaoAtual();
                atualizarIntervalo = setInterval(function() {
                    mostrarLocalizacaoAtual();
                }, 5000); // Atualiza a localização a cada 5 segundos
            } else {
                document.getElementById('map').innerText = "A localização não será exibida.";
            }
        }

        function mostrarLocalizacaoAtual() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var posicao = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    if (marcadorAtual) {
                        // Atualiza a posição do marcador existente
                        marcadorAtual.setPosition(posicao);
                    } else {
                        // Cria um novo marcador se não existir
                        marcadorAtual = new google.maps.Marker({
                            position: posicao,
                            map: map,
                            title: 'Minha Localização'
                        });
                    }

                    // Centraliza o mapa apenas na primeira execução
                    if (primeiraAtualizacao) {
                        map.setCenter(posicao);
                        primeiraAtualizacao = false;
                    }
                }, function() {
                    console.error('Erro: Não foi possível acessar a geolocalização.');
                });
            } else {
                console.error('Erro: O navegador não suporta geolocalização.');
            }
        }

        function toggleLateral() {
            var lateral = document.getElementById('lateral');
            var mapElement = document.getElementById('map');
            lateral.classList.toggle('abrir');
            mapElement.classList.toggle('lateral-aberta');
        }

        function pararAtualizacaoLocalizacao() {
            clearInterval(atualizarIntervalo);
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
</body>
</html>
