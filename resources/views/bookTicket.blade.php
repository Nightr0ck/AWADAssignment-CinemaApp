<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book a Ticket</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/bookTicket.css">
</head>
<body>
    <x-nav-bar-header />
    <h1>Book tickets for {{ $movie["name"] }}</h1>
    <form action="/book/{{ $movie['id'] }}" method="post">
        @csrf
        <div class="showtime">
            <div>
                <label>Showtime</label>
                <input type="date" name="date" id="date">
                <input type="time" name="time" id="time">
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
            <div>
                <label>Seat</label>
                <select name="seatRow" id="seatRow">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                    <option value="H">H</option>
                </select>
                <span>-</span>
                <select name="seatNum" id="seatNum">
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
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
            <div>
                <label for="hall">Hall type</label>
                <select name="hall" id="hall">
                    @foreach ($halls as $hall)
                        <option value={{ $hall["id"] }}>{{ $hall["type"] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="errorMessage">
                @error('hall')
                    <span>{{ $message }}</span>
                @enderror
            </div>
        </div>
        <input type="submit" value="Book">
    </form>
</body>
</html>