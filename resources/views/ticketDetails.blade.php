<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket Details</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/ticketDetails.css">
</head>
<body>
    <x-nav-bar-header />
    <div class="ticketDetailsHeader">
        Ticket Details
    </div>
    <table>
        <tr>
            <td>Movie</td>
            <td>{{ $ticket->movie->name }}</td>
        </tr>
        <tr>
            <td>Date</td>
            <td>{{ $ticket["date"] }}</td>
        </tr>
        <tr>
            <td>Time</td>
            <td>{{ $ticket["time"] }}</td>
        </tr>
        <tr>
            <td>Seat</td>
            <td>{{ $ticket["seat"] }}</td>
        </tr>
        <tr>
            <td>Hall</td>
            <td>{{ $ticket->hall->type }}</td>
        </tr>
    </table>
    @cannot('overdue', $ticket)
        <div class="ticketActions">
            <a href="/ticket/edit/{{ $ticket['id'] }}">Edit</a>
            <a href="/ticket/cancel/{{ $ticket['id'] }}">Cancel</a>
        </div>
    @endcannot
</body>
</html>