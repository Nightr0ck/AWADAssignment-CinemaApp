<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit ticket</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/editTicket.css">
</head>
<body>
    <x-nav-bar-header />
    <div class="editTicketHeader">
        Edit ticket
    </div>
    <form action="/ticket/edit/{{ $ticket['id'] }}" method="post">
        @csrf
        <div class="movie">
            <label for="movie">Movie</label>
            <textarea name="movie" id="movie" cols="50" rows="1" disabled>{{ $ticket->movie->name }}</textarea>
        </div>
        <div class="showtime">
            <div class="input">
                <label>Showtime</label>
                <input type="date" name="date" id="date" value={{ $ticket["date"] }}>
                <input type="time" name="time" id="time" value={{ $ticket["time"] }}>
            </div>
            <div class="errorMessage">
                @error('date')
                    <span>{{ $message }}</span>
                @enderror
                @error('time')
                    <span>{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="seat">
            <div class="input">
                <label>Seat</label>
                <select name="seatRow" id="seatRow">
                    <option id="A" value="A">A</option>
                    <option id="B" value="B">B</option>
                    <option id="C" value="C">C</option>
                    <option id="D" value="D">D</option>
                    <option id="E" value="E">E</option>
                    <option id="F" value="F">F</option>
                    <option id="G" value="G">G</option>
                    <option id="H" value="H">H</option>
                </select>
                <span>-</span>
                <select name="seatNum" id="seatNum">
                    <option id="01" value="01">01</option>
                    <option id="02" value="02">02</option>
                    <option id="03" value="03">03</option>
                    <option id="04" value="04">04</option>
                    <option id="05" value="05">05</option>
                    <option id="06" value="06">06</option>
                    <option id="07" value="07">07</option>
                    <option id="08" value="08">08</option>
                    <option id="09" value="09">09</option>
                    <option id="10" value="10">10</option>
                    <option id="11" value="11">11</option>
                    <option id="12" value="12">12</option>
                    <option id="13" value="13">13</option>
                    <option id="14" value="14">14</option>
                </select>
            </div>
            <div class="errorMessage">
                @error('seatRow')
                    <span>{{ $message }}</span>
                @enderror
                @error('seatNum')
                    <span>{{ $message }}</span>
                @enderror
                @error('seat')
                    <span>{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="hall">
            <label for="hall">Hall</label>
            <input type="text" name="hall" id="hall" value={{ $ticket->hall->type }} disabled>
        </div>
        <input type="submit" value="Update">
    </form>
    <script>
        const seat = "{{ $ticket['seat'] }}".split("-");
        document.getElementById(seat[0])["selected"] = true
        document.getElementById(seat[1])["selected"] = true
    </script>
</body>
</html>