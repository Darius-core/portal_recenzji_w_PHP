<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Director extends Model{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'bio', 'birthday'
    ];

    public function movies(){
        return $this->belongsToMany(Movie::class);
    }
}