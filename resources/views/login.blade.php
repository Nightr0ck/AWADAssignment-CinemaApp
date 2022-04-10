<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    <x-nav-bar-header />
    <h1>Login to your account</h1>

    <div class="loginForm">
        <form action="/login" method="POST">
            @csrf
            <div class="username">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value={{ old("username") }}>
            </div>
            <div class="password">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <input type="checkbox" name="remember" id="remember" {{ old("remember") ? "checked" : "" }}>
            <label for="remember">Remember me</label><br>
            <div class="login">
                <input type="submit" value="Login">
                @error("invalid")
                    <span class="invalid">{{ $message }}</span>
                @enderror
            </div>
        </form>
    </div>
</body>
</html>