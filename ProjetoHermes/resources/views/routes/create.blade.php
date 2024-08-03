<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=10, minimum-scale=1.0">

    <title>Cadastro de Rota</title>
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

        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="file"] {
            margin-bottom: 20px;
        }

        button[type="submit"], #saveButton {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }

        button[type="submit"]:hover, #saveButton:hover {
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

        #map {
            display: none;
            height: 400px;
            width: 100%;
            margin-top: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
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
    <h1>Cadastro de Rota</h1>
    
    @if ($errors->any())
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="createRouteForm" action="{{ route('routes.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        @csrf
        <div>
            <label for="name">Nome da Rota:</label><br>
            <input type="text" id="name" name="name" value="{{ old('name') }}"><br><br>
        </div>
        <div>
            <label for="coordinates_file">Arquivo JSON de Coordenadas:</label><br>
            <input type="file" id="coordinates_file" name="coordinates_file" onchange="previewMap(this)"><br><br>
        </div>
        <button type="submit" id="saveButton" style="display: none;">Salvar Rota</button>
    </form>

    <!-- Div para mostrar o preview do mapa -->
    <div id="map"></div>

    <!-- Script para inicializar o mapa -->
    <script>
        var map;
        var mapMarkers = [];

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: { lat: -22.915822982788086, lng: -42.819297790527344 } // Ponto central inicial
            });
        }

        function previewMap(input) {
            var file = input.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    var jsonContents = event.target.result;
                    var coordinates = JSON.parse(jsonContents).coordinates;

                    // Limpar markers anteriores, se houver
                    mapMarkers.forEach(marker => marker.setMap(null));
                    mapMarkers = [];

                    // Adicionar markers para cada ponto de coordenada
                    coordinates.forEach(coord => {
                        var marker = new google.maps.Marker({
                            position: { lat: parseFloat(coord.lat), lng: parseFloat(coord.lng) },
                            map: map,
                            title: 'Ponto de Rota'
                        });
                        mapMarkers.push(marker);
                    });

                    // Ajustar o zoom do mapa para mostrar todas as coordenadas
                    var bounds = new google.maps.LatLngBounds();
                    coordinates.forEach(coord => bounds.extend(new google.maps.LatLng(coord.lat, coord.lng)));
                    map.fitBounds(bounds);

                    // Mostrar o mapa após o carregamento do arquivo
                    document.getElementById('map').style.display = 'block';
                    document.getElementById('saveButton').style.display = 'inline-block';
                };

                reader.readAsText(file);
            }
        }

        function validateForm() {
            // Validar se o arquivo foi selecionado antes de enviar o formulário
            var fileInput = document.getElementById('coordinates_file');
            if (!fileInput.files[0]) {
                alert('Selecione um arquivo JSON de coordenadas.');
                return false;
            }
            return true;
        }
    </script>

    <!-- Carrega a API do Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
</body>
</html>
