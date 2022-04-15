<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Ticket extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ["username", "movie_id", "date", "time", "seat", "hall_id"];

    public function user()
    {
        return $this->belongsTo(User::class, "username");
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }

    public function overdue()
    {
        return Carbon::now() > Carbon::parse($this["date"] . " " . $this["time"]);
    }
}
