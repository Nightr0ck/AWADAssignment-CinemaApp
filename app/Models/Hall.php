<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hall extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["username", "movie_id", "date", "time", "seat", "hall_id"];
    protected $dates = ["deleted_at"];

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
