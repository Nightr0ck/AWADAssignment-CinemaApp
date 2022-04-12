<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Profile</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/updatePassword.css">
</head>
<body>
    <x-nav-bar-header />
    <h1>Updating your password</h1>
    <form action="/profile/update/password" method="post">
        @csrf
        <div class="currentPassword">
            <label for="currentPassword">Current Password</label>
            <input type="password" name="currentPassword" id="currentPassword">
            @error('currentPassword')
                <span class="errorMessage">{{ $message }}</span>
            @enderror
        </div>
        <div class="newPassword">
            <label for="newPassword">New Password</label>
            <input type="password" name="newPassword" id="newPassword">
            @error('newPassword')
                <span class="errorMessage">{{ $message }}</span>
            @enderror
        </div>
        <div class="confirmPassword">
            <label for="confirmPassword">Confirm new Password</label>
            <input type="password" name="confirmPassword" id="confirmPassword">
            @error('confirmPassword')
                <span class="errorMessage">{{ $message }}</span>
            @enderror
        </div>
        <input type="submit" value="Update">
    </form>
</body>
</html>