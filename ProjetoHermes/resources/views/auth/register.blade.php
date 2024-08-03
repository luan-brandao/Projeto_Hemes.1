<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href='/css/register.css'>
</head>
<body>
    <div class="register-container">
        <h1>Registro</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label for="name">Nome</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror

                <label for="password">Senha</label>
                <input id="password" type="password" name="password" required>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror

                <label for="password-confirm">Confirmar senha</label>
                <input id="password-confirm" type="password" name="password_confirmation" required>
            </div>

            <!-- Checkbox para selecionar como Super Admin -->
            <!-- <div class="super-admin-checkbox">
                <input id="superadmin" type="checkbox" name="superadmin" value="1">
                <label for="superadmin">Registrar como Super Admin</label>
            </div> -->

            <!-- Checkbox para selecionar como Motorista -->
            <div class="driver-checkbox">
                <label for="driver">Motorista</label>
                <input id="driver" type="checkbox" name="driver" value="1">
            </div>

            <!-- Campos adicionais para motoristas -->
            <div id="driver-fields" class="driver-fields">
                <label for="cnh">CNH</label>
                <input id="cnh" type="text" name="cnh">

                <label for="vehicle">Veículo</label>
                <input id="vehicle" type="text" name="vehicle">

                <label for="vehicle-doc">Documentação do Veículo</label>
                <input id="vehicle-doc" type="text" name="vehicle_doc">

                <label for="passengers">Quantos passageiros cabem</label>
                <input id="passengers" type="number" name="passengers">
            </div>

            <button type="submit">Registrar</button>
        </form>
    </div>
    <script src="/js/maps/register.js"></script>
</body>
</html>
