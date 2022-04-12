<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie Details</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/movieDetails.css">
</head>
<body>
    <x-nav-bar-header />
    <div class="name">{{ $movie["name"] }}</div>
    <div class="durationGenre">
        <div class="duration">{{ $movie["duration"] }} minutes</div>
        <div class="genre">{{ $movie["genre"] }}</div>
    </div>
    <div class="synopsis">{{ $movie["synopsis"] }}</div>
    <a href="/book/{{ $movie['id'] }}">Book tickets</a>
</body>
</html>