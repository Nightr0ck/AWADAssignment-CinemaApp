<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <h1>This is the home page</h1>
    @auth
        <span>User is logged in</span>
    @endauth

    @guest
        <span>User is NOT logged in</span>
    @endguest
</body>
</html>