<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Movie</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/adminEditMovie.css">
</head>
<body>
    <x-nav-bar-header />
    <h1>Edit movie page</h1>

    <form action="/admin/movie/edit/{{$movie['id']}}" method="post">
        @csrf
        <div style="white-space: pre">
            <label for="name">Movie name</label>
            <textarea name="name" id="name">{{$movie["name"]}}</textarea>
        </div>
        <div>
            <label for="duration">Movie duration (minutes)</label>
            <input id="duration" name="duration" type="number" value={{$movie["duration"]}}>
        </div>
        <div>
            <label for="synopsis">Movie synopsis</label>
            <textarea id="synopsis" name="synopsis" rows="10">{{$movie["synopsis"]}}</textarea>
        </div>
        <div>
            <label for="genre">Movie genre</label>
            <textarea name="genre" id="genre">{{$movie["genre"]}}</textarea>
            {{-- <input id="genre" name="genre" type="text" value={{$movie["genre"]}}> --}}
        </div>
        <div style="flex-direction: row;">
            @foreach ($halls as $hall)
                @if (in_array($hall["id"], $checkedHalls))
                    <input id={{$hall["id"]}} name="halls[]" value={{$hall["id"]}} type="checkbox" checked>
                @else
                    <input id={{$hall["id"]}} name="halls[]" value={{$hall["id"]}} type="checkbox">
                @endif
                <label for={{$hall["id"]}} style="margin-right: 15px;">{{$hall["type"]}}</label>
            @endforeach
        </div>
        <input type="submit" value="Update">
    </form>
</body>
</html>