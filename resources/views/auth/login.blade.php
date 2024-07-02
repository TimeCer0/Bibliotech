<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/storage/images/bibliotech_logo.png">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="{{ asset('login.css') }}">
    
</head>
<body>
    <div class="logo_bibliotech">
        <a href="/"> 
            <img src="/storage/images/bibliotech_logo.png" style="opacity: 0.8;width: 100px;height: 100px;position: fixed;top: 30px;left: 30px;filter: drop-shadow(0px 0px 5px black);"> 
        </a>
    </div>
    <div class="login-form">
        <div class="login-title">INICIO DE SESIÓN</div>
        <div class="form-login-bibliotech">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Address -->
                <div class="form-group">
                    <label for="email"><span class="icon">✉️</span>Correo</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                    <x-input-error :messages="$errors->get('email')" class="error-message" />
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password"><span class="icon">🔒</span>Contraseña</label>
                    <input id="password" type="password" name="password" required placeholder="Enter your password">
                    <x-input-error :messages="$errors->get('password')" class="error-message" />
                </div>

                <!-- Remember Me -->
                <div class="form-check-group">
                    <input id="remember_me" type="checkbox" name="remember" class="mr-2">
                    <label for="remember_me" class="remember-me-label">Recordarme</label>
                </div>

                <!-- Forgot Password -->
                <a href="{{ route('password.request') }}" class="forgot-password">Olvidaste tu contraseña?</a>

                <!-- Submit Button -->
                <div class="submit-button-container">
                    <button type="submit" class="submit-button">Iniciar sesión</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
