// maap.js

var map;
var directionsService;
var directionsRenderer;
var marcadorUsuario; // Variável para armazenar o marcador da localização do usuário
var marcadoresMotoristas = []; // Array para armazenar marcadores dos motoristas

function initMap() {
    // Inicializa o mapa do Google
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: -22.915822982788086, lng: -42.819297790527344 },
        zoom: 14
    });

    // Inicializa os serviços de direção
    directionsService = new google.maps.DirectionsService();
    directionsRenderer = new google.maps.DirectionsRenderer({
        map: map,
        suppressMarkers: true // Suprime os marcadores padrão
    });

    // Exibe a localização do usuário, se permitido
    mostrarLocalizacaoUsuario();

    // Adiciona marcadores dos motoristas
    adicionarMarcadoresMotoristas();
}

function mostrarLocalizacaoUsuario() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var posicao = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            // Cria um marcador para a localização do usuário
            marcadorUsuario = new google.maps.Marker({
                position: posicao,
                map: map,
                title: 'Sua Localização'
            });

            // Centraliza o mapa na localização do usuário
            map.setCenter(posicao);
        }, function() {
            console.error('Erro: Não foi possível acessar a geolocalização.');
        });
    } else {
        console.error('Erro: O navegador não suporta geolocalização.');
    }
}

function adicionarMarcadoresMotoristas() {
    // Itera sobre os dados dos motoristas para adicionar marcadores no mapa
    motoristasData.forEach(function(motorista) {
        var marker = new google.maps.Marker({
            position: { lat: parseFloat(motorista.latitude), lng: parseFloat(motorista.longitude) },
            map: map,
            title: motorista.name
        });

        // Adiciona o marcador ao array de marcadores dos motoristas
        marcadoresMotoristas.push(marker);

        // Adiciona informações adicionais ao marcador, se necessário
        var infowindow = new google.maps.InfoWindow({
            content: '<h3>' + motorista.name + '</h3>'
            // Adicione aqui mais informações como localização, etc.
        });

        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
    });
}

function calcularRota(coordinates) {
    var pontos = coordinates;

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

    directionsService.route(request, function(result, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsRenderer.setDirections(result);
        } else {
            console.error('Erro ao calcular rota:', status);
        }
    });
}

// Função para alternar a visibilidade dos marcadores dos motoristas
function alternarMarcadoresMotoristas(visivel) {
    marcadoresMotoristas.forEach(function(marker) {
        marker.setVisible(visivel);
    });
}

// Função para centralizar o mapa na localização do usuário
function centralizarMapaUsuario() {
    if (marcadorUsuario) {
        map.setCenter(marcadorUsuario.getPosition());
    }
}

// Função para abrir/fechar a barra lateral
function toggleLateral() {
    var lateral = document.getElementById('lateral');
    var mapElement = document.getElementById('map');
    lateral.classList.toggle('abrir');
    mapElement.classList.toggle('lateral-aberta');
}

// Chamada para inicializar o mapa quando o DOM estiver pronto
document.addEventListener('DOMContentLoaded', function() {
    initMap();
});

document.getElementById('toggleButton').addEventListener('click', function() {
    this.classList.toggle('open');
});
