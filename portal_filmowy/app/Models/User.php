<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
        'font_size', 'high_contrast'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'high_contrast' => 'boolean',
        'font_size' => 'float',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function isAdmin(){
        return $this->roles()->where('name', 'admin')->exists();
    }

}