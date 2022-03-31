<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function movie()
    {
        return $this->hasOne(Movie::class);
    }

    public function hall()
    {
        return $this->hasOne(Hall::class);
    }
}
