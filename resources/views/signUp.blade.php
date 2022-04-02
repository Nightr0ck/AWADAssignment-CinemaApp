<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/signUp.css">
</head>
<body>
    <h1>Sign up for an account</h1>
    <form action="/signup" method="POST">
        @csrf
        <div class="username">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
            <span class="invalid">
                @error('username')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="password">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <span class="invalid">
                @error('password')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <input type="submit" value="Sign up">
    </form>
</body>
</html>