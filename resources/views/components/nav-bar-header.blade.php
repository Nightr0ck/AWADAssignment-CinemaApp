<link rel="stylesheet" href="/css/navBarHeader.css">

<div class="navBarContainer">
    <div class="navigation">
        <a href="/">Home</a>
        @can('isAdmin')
            <a href="/admin">Admin Dashboard</a>
        @endcan
    </div>
    <div class="profile">
        @auth
            <a href="/logout">Logout</a>
        @endauth

        @guest
            <a href="/login">Login</a>
            <a href="/signup">Sign Up</a>
        @endguest
    </div>
</div>