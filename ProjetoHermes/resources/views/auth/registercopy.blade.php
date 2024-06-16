<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #222222;
        }

        .register-container {
            background-color: white;
            padding: 150px;
            border-radius: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .register-container h1 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 30px;
        }

        .register-container form {
            max-width: 350px;
            margin: 0 auto;
        }

        .register-container label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.2rem;
        }

        .register-container input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 1.2rem;
        }

        .register-container button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .register-container button:hover {
            background-color: #0056b3;
        }

        .register-container .error {
            color: red;
            font-size: 1rem;
        }

        .register-container .super-admin-checkbox {
            margin-bottom: 10px;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Register</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" name="password_confirmation" required>
            </div>

            <!-- Checkbox para selecionar como Super Admin -->
            <div class="super-admin-checkbox">
                <input id="superadmin" type="checkbox" name="superadmin" value="1">
                <label for="superadmin">Register as Super Admin</label>
            </div>

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
