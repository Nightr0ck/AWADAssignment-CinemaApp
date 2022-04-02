<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = "username";
    protected $keyType = "string";
    protected $guard = "admin";
    public $timestamps = false;
    protected $fillable = ["username", "password"];
    protected $hidden = ['password','remember_token'];
    
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
