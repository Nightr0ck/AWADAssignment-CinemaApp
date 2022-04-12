<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Hall</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/adminEditHall.css">
</head>
<body>
    <x-nav-bar-header />
    <h1>Edit hall page</h1>

    <form action="/admin/hall/edit/{{ $hall['id'] }}" method="post">
        @csrf
        <div>
            <label for="type">Hall type</label>
            <input type="text" name="type" id="type" value={{$hall["type"]}}>
            @error('type')
                <span class="errorMessage">{{ $message }}</span>
            @enderror
        </div>
        <input type="submit" value="Update">
    </form>
</body>
</html>