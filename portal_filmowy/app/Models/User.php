<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
        'font_size', 'high_contrast','is_active'
    ];

    protected $hidden = [
        'password', 'remember_token',
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

    public function scopeActive($query){
        return $query->where('is_active', true);
    }

}