<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    protected $fillable = ["username", "movie_id", "date", "time", "seat", "hall_id"];

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
