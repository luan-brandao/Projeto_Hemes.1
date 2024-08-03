<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=10, minimum-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #292929;
        }

        .login-container {
            background-color: white;
            padding: 150px;
            border-radius: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .login-container h1 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 30px;
        }

        .login-container form {
            max-width: 350px;
            margin: 0 auto;
        }

        .login-container label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.2rem;
        }

        .login-container input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 1.2rem;
        }

        .login-container button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.2rem;
        }

        .login-container button:hover {
            background-color: #0056b3;
        }

        .login-container .error {
            color: red;
            font-size: 1rem;
        }
        @media (max-width:450px){
            .login-container {
                width: 300px;
                padding: 20px;
            }

            .login-container h1 {
                font-size: 1.5rem;
            }

            .login-container input, .login-container button {
                font-size: 0.875rem;
                padding: 8px;
                margin-right: 20px;
            }

        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
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
                <label for="remember">Remember Me</label>
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            </div>

            <div>
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
