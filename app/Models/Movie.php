<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;
    protected $dates = ["deleted_at"];
    protected $fillable = ["name", "duration", "synopsis", "genre"];

    public function halls()
    {
        return $this->belongsToMany(Hall::class);
    }
}
