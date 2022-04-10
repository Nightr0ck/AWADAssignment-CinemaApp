<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/home.css">
</head>
<body>
    <x-nav-bar-header />
    <h1>Welcome to Generic Cinema App #342</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Duration (Minutes)</th>
            <th>Synopsis</th>
            <th>Genre</th>
        </tr>
        @foreach ($movies as $movie)
            <tr>
                <td>{{$movie["id"]}}</td>
                <td><a href="movie/{{$movie['id']}}">{{$movie["name"]}}</a></td>
                <td>{{$movie["duration"]}}</td>
                <td>{{$movie["synopsis"]}}</td>
                <td>{{$movie["genre"]}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>