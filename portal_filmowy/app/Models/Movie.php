<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'release_year', 'poster_path'
    ];

    public function actors(){
        return $this->belongsToMany(Actor::class);
    }

    public function directors(){
        return $this->belongsToMany(Director::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function averageRating(){
        return round($this->reviews()->avg('rating'), 1);
    }

}