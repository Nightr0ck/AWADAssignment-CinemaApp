<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $primaryKey = "username";
    protected $keyType = "string";
    public $timestamps = false;
    protected $hidden = ['password','remember_token'];
    
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
