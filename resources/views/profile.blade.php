<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/profile.css">
</head>
<body>
    <x-nav-bar-header />
    <div class="profileHeader">{{ $user["username"] }}'s profile</div>
    <a href="/profile/update/password">Update password</a>
    <a class="deactivate" href="/profile/deactivate">Deactivate account</a>

    <div class="bookedTicketsHeader">Booked tickets</div>
    <table>
        <tr>
            <th>Movie</th>
            <th>Date</th>
            <th>Time</th>
            <th>Seat</th>
            <th>Hall</th>
            <th colspan="2">Actions</th>
        </tr>
        @foreach ($user->tickets as $ticket)
            <tr>
                <td><a href="/ticket/view/{{ $ticket['id'] }}">{{ $ticket->movie->name }}</a></td>
                <td>{{ $ticket["date"] }}</td>
                <td>{{ $ticket["time"] }}</td>
                <td>{{ $ticket["seat"] }}</td>
                <td>{{ $ticket->hall->type }}</td>
                @if ($ticket->overdue())
                    <td colspan="2">-</td>
                @else
                    <td><a href="/ticket/edit/{{ $ticket['id'] }}">Edit</a></td>
                    <td><a href="/ticket/cancel/{{ $ticket['id'] }}">Cancel</a></td>
                @endif
            </tr>
        @endforeach
    </table>
</body>
</html>