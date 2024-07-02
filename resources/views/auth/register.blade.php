<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/storage/images/bibliotech_logo.png">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="{{ asset('register.css') }}">
    
</head>
<body>
    <div class="logo_bibliotech">
        <a href="/"> 
            <img src="/storage/images/bibliotech_logo.png" style="opacity: 0.8;width: 100px;height: 100px;position: fixed;top: 30px;left: 30px;filter: drop-shadow(0px 0px 5px black);"> 
        </a>
    </div>
    <div class="register-form">
        <div class="register-title">REGISTRO</div>
        <div class="form-register-bibliotech">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label for="name"><span class="icon">👤</span>Nombre</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Enter your name">
                    <x-input-error :messages="$errors->get('name')" class="error-message" />
                </div>

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email"><span class="icon">✉️</span>Correo</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="Enter your email">
                    <x-input-error :messages="$errors->get('email')" class="error-message" />
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password"><span class="icon">🔒</span>Contraseña</label>
                    <input id="password" type="password" name="password" required placeholder="Enter your password">
                    <x-input-error :messages="$errors->get('password')" class="error-message" />
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation"><span class="icon">🔒</span>Confirmar contraseña</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="Confirm your password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" />
                </div>

                <div class="submit-button-container">
                    <a href="{{ route('login') }}" class="already-registered">Ya registrado?</a>
                    <button type="submit" class="submit-button">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
