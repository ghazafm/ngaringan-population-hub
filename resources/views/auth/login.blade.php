<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            background-color: #f1f3f4; /* Latar belakang abu-abu terang */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-size: cover;
            background-position: center;
            animation: slide 30s infinite;
        }

        /* @keyframes slide {
            0% { background-image: url('images/image1.jpeg'); }
            33% { background-image: url('images/image2.jpeg'); }
            66% { background-image: url('images/image3.jpeg'); }
            100% { background-image: url('images/image1.jpeg'); }
        } */

        .container {
            display: flex;
            width: 55%;
            max-width: 1200px;
            height: 80%;
            background: rgba(255, 255, 255, 0.9); /* Latar belakang semi-transparan */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .image-section {
            flex: 1;
            background: url('images/image1.jpeg') no-repeat center center;
            background-size: cover;
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
        }

        .form-section {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center; /* Center align items */
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 150px; /* Adjust size as needed */
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            color: #202124; /* Warna teks gelap */
            margin: 0;
        }

        .header h2 {
            font-size: 16px;
            color: #5f6368; /* Warna teks abu-abu */
            margin: 0;
        }

        .login-form-container {
            max-width: 360px;
            width: 100%;
            padding: 20px;
            background-color: #ffffff; /* Warna latar belakang form putih */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .login-form-container .form-group {
            margin-bottom: 15px;
        }

        .login-form-container .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #202124;
        }

        .login-form-container .form-group input[type="email"],
        .login-form-container .form-group input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #dadce0;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .login-form-container .form-group input[type="email"]:focus,
        .login-form-container .form-group input[type="password"]:focus {
            border-color: #4285f4;
            outline: none;
        }

        .login-form-container .form-group input[type="checkbox"] {
            margin-right: 5px;
        }

        .login-form-container .form-group .remember-me-label {
            font-size: 14px;
            color: #202124;
        }

        .login-form-container .form-group .forgot-password {
            color: #4285f4;
            text-decoration: none;
        }

        .login-form-container .form-group .forgot-password:hover {
            text-decoration: underline;
        }

        .login-form-container .form-group .login-button {
            background-color: #4285f4; /* Warna biru Google */
            color: #ffffff;
            border: none;
            padding: 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        .login-form-container .form-group .login-button:hover {
            background-color: #357ae8;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="image-section">
            <!-- Gambar yang terletak di sisi kiri -->
        </div>
        <div class="form-section">
            <div class="logo">
                <img src="images/logo_only.png" alt="Logo">
                <h2>Selamat Datang!</h2> <!-- Tambahkan path logo di sini -->
            </div>
            <div class="login-form-container">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="form-group">
                            <div class="font-medium text-sm text-red-600">
                                {{ session('status') }}
                            </div>
                        </div>
                    @endif

                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <!-- Error Message -->
                        @error('email')
                            <div class="text-red-600 mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group mt-4">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        <!-- Error Message -->
                        @error('password')
                            <div class="text-red-600 mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="form-group mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" name="remember">
                            <span class="remember-me-label">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="form-group flex items-center justify-between mt-4">
                        @if (Route::has('password.request'))
                            <a class="forgot-password" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <button type="submit" class="login-button">
                            {{ __('Log in') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
