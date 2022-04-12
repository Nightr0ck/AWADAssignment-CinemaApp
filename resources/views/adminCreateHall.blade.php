<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create hall</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/adminCreateHall.css">
</head>
<body>
    <x-nav-bar-header />
    <h1>Create a new hall</h1>
    <form action="/admin/hall/create" method="post">
        @csrf
        <div>
            <label for="type">Hall type</label>
            <input id="type" name="type" type="text">
            @error('type')
                <span class="errorMessage">{{ $message }}</span>
            @enderror
        </div>
        <input type="submit" value="Create">
    </form>
</body>
</html>