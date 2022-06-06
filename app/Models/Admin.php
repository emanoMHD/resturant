<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'admin';

//    public function sendPasswordResetNotification($token)
//    {
//        $this->notify(new AdminPasswordResetNotification($token));
//    }

    protected $fillable = [
        'name', 'email', 'password','phone'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
