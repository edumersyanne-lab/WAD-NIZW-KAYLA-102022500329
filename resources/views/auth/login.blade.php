<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Digital Library</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .login-box { max-width: 380px; margin: 80px auto; padding: 24px; border: 1px solid #ddd; border-radius: 8px; }
        .login-box label { display: block; margin-top: 12px; }
        .login-box input[type=email],
        .login-box input[type=password] { width: 100%; padding: 8px; box-sizing: border-box; }
        .login-box button { margin-top: 16px; width: 100%; padding: 10px; cursor: pointer; }
        .error { color: #c0392b; font-size: 14px; margin-top: 4px; }
    </style>
</head>
<body>
<div class="login-box">
    <h1>Login</h1>
    <p>Digital Library</p>

    <form action="{{ route('login.attempt') }}" method="POST">
        @csrf

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        @error('password')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>
            <input type="checkbox" name="remember"> Ingat saya
        </label>

        <button type="submit">Masuk</button>
    </form>
</div>
</body>
</html>