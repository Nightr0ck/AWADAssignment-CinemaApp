<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create movie</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/adminCreateMovie.css">
</head>
<body>
    <x-nav-bar-header />
    <h1>Create a new movie</h1>
    <form action="/admin/movie/create" method="post">
        @csrf
        <div>
            <label for="name">Movie name</label>
            <input id="name" name="name" type="text">
        </div>
        <div>
            <label for="duration">Movie duration (minutes)</label>
            <input id="duration" name="duration" type="number">
        </div>
        <div>
            <label for="synopsis">Movie synopsis</label>
            <textarea id="synopsis" name="synopsis" rows="10"></textarea>
        </div>
        <div>
            <label for="genre">Movie genre</label>
            <input id="genre" name="genre" type="text">
        </div>
        <div style="flex-direction: row;">
            @foreach ($halls as $hall)
                <input id={{$hall["id"]}} name="halls[]" value={{$hall["id"]}} type="checkbox">
                <label for={{$hall["id"]}} style="margin-right: 15px;">{{$hall["type"]}}</label>
            @endforeach
        </div>
        <input type="submit" value="Create">
    </form>
</body>
</html>