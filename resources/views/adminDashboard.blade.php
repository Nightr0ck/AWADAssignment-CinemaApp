<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/adminDashboard.css">
</head>
<body>
    <x-nav-bar-header />
    <h1>Admin dashboard</h1>
    
    <div class="tableHeader">Movies</div>
    <a href="/admin/movie/create">Create new movie</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Duration (Minutes)</th>
            <th>Synopsis</th>
            <th>Genre</th>
            <th colspan="2">Actions</th>
        </tr>
        @foreach ($movies as $movie)
            <tr>
                <td>{{$movie["id"]}}</td>
                <td>{{$movie["name"]}}</td>
                <td>{{$movie["duration"]}}</td>
                <td>{{$movie["synopsis"]}}</td>
                <td>{{$movie["genre"]}}</td>
                <td><a href="/admin/movie/edit/{{$movie["id"]}}">Edit</a></td>
                <td><a href="/admin/movie/delete/{{$movie["id"]}}">Delete</a></td>
            </tr>
        @endforeach
    </table>

    <div class="tableHeader">Halls</div>
    <a href="/admin/hall/create">Create new hall</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th colspan="2">Actions</th>
        </tr>
        @foreach ($halls as $hall)
            <tr>
                <td>{{$hall["id"]}}</td>
                <td>{{$hall["type"]}}</td>
                <td><a href="/admin/movie/edit/{{$hall["id"]}}">Edit</a></td>
                <td><a href="/admin/movie/delete/{{$hall["id"]}}">Delete</a></td>
            </tr>
        @endforeach
    </table>
</body>
</html>